<?php

namespace App\Services\ElasticServices;

use App\Models\Lead;
use Elastic\Elasticsearch\ClientBuilder;
use App\Services\ElasticServices\ElasticConstants;

class ElasticAlterUpdate
{
    public $elasticInstance;

    public function __construct()
    {
        $hosts = [env('ELASTICSEARCH_HOST')];
        $this->elasticInstance = ClientBuilder::create()->setHosts($hosts)->build();
    }

    public function createIndex()
    {
        $params = [
            'index' =>ElasticConstants::$lead_list['index'],
            'body' => [
                'settings' => [
                    'analysis' => [
                        'analyzer' => [
                            'standard' => [
                                'type' => 'standard',

                            ],
                        ],
                    ],
                ],
                'mappings' => [
                    'properties' => [
                        'id' => ['type' => 'integer'],  // Use integer for IDs
                        'lead_name'    => ['type' => 'text'],
                        'email'   => ['type' => 'keyword'],  // Keyword for exact match
                        'lead_stage'   => ['type' => 'text'],
                        'city' => ['type' => 'text'],
                        'current_state' => ['type' => 'text'],
                        'lead_owner' => ['type' => 'text'],
                        'preferred_intake' => ['type' => 'text'],
                        'ielts_score' => ['type' => 'float'],  // Use float for scores
                        'sat_score' => ['type' => 'float'],   // Float for scores
                        'lead_status' => ['type' => 'keyword'],  // Status should be exact match
                        'work_experience' => ['type' => 'text'],  // Could be a text if detailed description is needed
                        'preferred_course_of_study' => ['type' => 'text'],
                        'has_passport' => ['type' => 'keyword'],  // Yes/No could be keyword
                        'preferred_universities' => ['type' => 'text'],  // Text for potential searching
                        'phone' => ['type' => 'keyword'],  // Exact match for phone numbers
                    ],
                ],
            ],
        ];

        try {
            $this->elasticInstance->indices()->create($params);
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'resource_already_exists_exception') !== false) {
            } else {
                throw $e;
            }
        }
    }

    public function deleteDocuments($index)
    {
        $client = $this->elasticInstance;
        try {
            $params = [
                'index' => $index,
                'body' => [
                    'query' => [
                        'match_all' => (object)[],
                    ]
                ]
            ];

            if ($client->indices()->exists(['index' => $index])) {
                $deleteDocs = $client->deleteByQuery($params);
            } else {
                return;
            }

        } catch (\Exception $e) {
            return null;
        }
    }

    // public function syncLeads()
    // {
    //     $index = ElasticConstants::$lead_list['index'];
    //     $this->deleteDocuments($index);
        
    //     $leads = LeadModel::all();
    //     $bulkParams = [];
    //     $bulkParams['index'] = $index;


    //     foreach ($leads as $lead) {

    //         $bulkParams['body'][] = [
    //             'id'      => $lead->id,
    //             'lead_name'    => $lead->lead_name,
    //             'email'   => $lead->email,
    //             'lead_stage'   => $lead->lead_stage,
    //             'city' => $lead->city,
    //             'current_state' => $lead->current_state,
    //             'lead_owner' => $lead->lead_owner,
    //             'preferred_intake' => $lead->preferred_intake,
    //             'ielts_score' => $lead->ielts_score,
    //             'sat_score' => $lead->sat_score,
    //             'lead_status' => $lead->lead_status,
    //             'work_experience' => $lead->work_experience,
    //             'preferred_course_of_study' => $lead->preferred_course_of_study,
    //             'has_passport' => $lead->has_passport,
    //             'preferred_universities' => $lead->preferred_universities,
    //             'phone' => $lead->phone,
    //         ];
    //     }
    //     try {
    //         if (!empty($bulkParams['body'])) {
    //             $this->elasticInstance->bulk($bulkParams);
    //         }
    //     } catch(Exception $e) {
    //         dd($e);
    //     }
    // }

    // public function syncLeads()
    // {
    //     $index = ElasticConstants::$lead_list['index'];
    //     $this->deleteDocuments($index);  // Ensure this deletes existing documents if needed
        
    //     $leads = LeadModel::all(); // Retrieve all leads from the model

    //     foreach ($leads as $lead) {
    //         $params = [
    //             'index' => $index,      // The index name
    //             'id'    => $lead->id,   // The document ID
    //             'body'  => [
    //                 'id' => $lead->id,
    //                 'lead_name' => $lead->lead_name,
    //                 'email' => $lead->email,
    //                 'lead_stage' => $lead->lead_stage,
    //                 'city' => $lead->city,
    //                 'current_state' => $lead->current_state,
    //                 'lead_owner' => $lead->lead_owner,
    //                 'preferred_intake' => $lead->preferred_intake,
    //                 'ielts_score' => $lead->ielts_score,
    //                 'sat_score' => $lead->sat_score,
    //                 'lead_status' => $lead->lead_status,
    //                 'work_experience' => $lead->work_experience,
    //                 'preferred_course_of_study' => $lead->preferred_course_of_study,
    //                 'has_passport' => $lead->has_passport,
    //                 'preferred_universities' => $lead->preferred_universities,
    //                 'phone' => $lead->phone,
    //             ]
    //         ];

    //         try {
    //             // Index the document
    //             $response = $this->elasticInstance->index($params);
    //             // Optionally handle response here
    //         } catch (Exception $e) {
    //             // Handle any exceptions here
    //             dd($e);
    //         }
    //     }
    // }

    public function syncLeads()
{
    $index = ElasticConstants::$lead_list['index'];
    $this->deleteDocuments($index);  // Ensure this deletes existing documents if needed

    Lead::chunk(1000, function ($leads) use ($index) {
        foreach ($leads as $lead) {
            $params = [
                'index' => $index,      // The index name
                'id'    => $lead->id,   // The document ID
                'body'  => [
                    'id' => $lead->id,
                    'lead_name' => $lead->lead_name,
                    'email' => $lead->email,
                    'lead_stage' => $lead->lead_stage,
                    'city' => $lead->city,
                    'current_state' => $lead->current_state,
                    'lead_owner' => $lead->lead_owner,
                    'preferred_intake' => $lead->preferred_intake,
                    'ielts_score' => $lead->ielts_score,
                    'sat_score' => $lead->sat_score,
                    'lead_status' => $lead->lead_status,
                    'work_experience' => $lead->work_experience,
                    'preferred_course_of_study' => $lead->preferred_course_of_study,
                    'has_passport' => $lead->has_passport,
                    'preferred_universities' => $lead->preferred_universities,
                    'phone' => $lead->phone,
                ]
            ];

            try {
                // Index the document
                $response = $this->elasticInstance->index($params);
                // Optionally handle response here
            } catch (Exception $e) {
                // Handle any exceptions here
                dd($e);
            }
        }
    });
}


}
