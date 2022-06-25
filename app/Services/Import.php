<?php

namespace App\Services;

set_time_limit(3600);

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;

class Import
{
    public static function csv($file, $headers, $model)
    {
        try {
            $model->delete();
            DB::beginTransaction();
            LazyCollection::make(function() use ($file) {
                $csv = fopen($file, 'r');
                while ($data = fgetcsv($csv, 0, ';')) {
                    yield $data;
                }
            })->skip(1)->each(function($data) use ($headers, $model) {
                self::parseData($data, $headers, $model);
            });

            DB::commit();
            return [
                'status' => 201,
                'message' => 'Importação realizada com sucesso!'
            ];
        } catch (Exception $e) {
            DB::rollBack();
            return [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
    }

    private function parseData(array $data, array $headers, $model) {
        $entity = [];
        foreach ($data as $key => $value) {
            $entity[$headers[$key]] = preg_replace(
                '/\,/',
                '.',
                preg_replace(
                    '/[.-]/',
                    '',
                    $value
                )
            );
        }

        $model->create($entity);
    }
}
