<?php
namespace App\Services\ElasticServices;

use App\Services\ElasticServices\ElasticAlterUpdate;
use App\Services\ElasticServices\ElasticConstants;

class ElasticQueryHandler
{
    protected $elasticService;

    public function __construct()
    {
        $this->elasticService = new ElasticAlterUpdate();
    }

    public function createIndex()
    {
        return $this->elasticService->createIndex();
    }

    // Sync Leads
    public function syncLeads()
    {
        return $this->elasticService->syncLeads();
    }

    // Search in Elasticsearch
    public function search($query)
    {
        // $query = ['bool' => ['must' => []]];

        // foreach ($filter_arr as $filter) {
        //     $filterName = $filter['filterName'];
        //     $selectedOption = $filter['selectedOption'];
        //     $inputValue = $filter['inputValue'];

        //     switch ($selectedOption) {
        //         case 1: // "is"
        //             $query['bool']['must'][] = ['match' => [$filterName => $inputValue]];
        //             break;
        //         case 2: // "isn't"
        //             $query['bool']['must'][] = ['bool' => ['must_not' => ['match' => [$filterName => $inputValue]]]];
        //             break;
        //         case 3: // "is empty"
        //             $query['bool']['must'][] = ['bool' => ['must_not' => ['exists' => ['field' => $filterName]]]];
        //             break;
        //         case 4: // "isn't empty"
        //             $query['bool']['must'][] = ['exists' => ['field' => $filterName]];
        //             break;
        //     }
        // }
        $params = [
            'index' => ElasticConstants::$lead_list['index'],
            'body' => [
                'size'=>21,
                'query' => $query
            ],
        ];
        
        // print_r($params);die;
        // $params = [
        //     'index' => 'leads_2',
        //     'body' => [
        //         'query' => [
        //             'bool' => [
        //                 'must' => [
        //                     [
        //                         'match' => [
        //                             'lead_name' => 'cbfhdnd'
        //                         ]
        //                     ],
        //                     [
        //                         'bool' => [
        //                             'must_not' => [
        //                                 'match' => [
        //                                     'phone' => '36373'
        //                                 ]
        //                             ]
        //                         ]
        //                     ]
        //                 ]
        //             ]
        //         ]
        //     ]
        // ];

        try {
            $response = $this->elasticService->elasticInstance->search($params)->asArray();
            $leads = [];
            
            foreach ($response['hits']['hits'] as $hit) {
                $leads[] = $hit['_source'];
            }

            // print_r($leads);die;
            return $leads;
        } catch (\Exception $e) {
            throw new \Exception('Search query failed: ' . $e->getMessage());
        }
    }
}
