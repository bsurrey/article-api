<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;

class ArticleResource extends JsonResource
{
    /**
     * return an array of the article object
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'title'             => $this->title,
            'text'              => $this->text,
            'author'            => $this->author,
            'sentim_score'      => $this->getSentimScore(),
            'publication_date'  => $this->publication_date,
            'created_at'        => $this->created_at,
        ];
    }

    /**
     * get the sentim score for the text of an article
     *
     * @return null|string
     */
    public function getSentimScore()
    {
        $api = 'https://sentim-api.herokuapp.com/api/v1/';

        $response = curl_init($api);
        curl_setopt($response, CURLOPT_POST, 1);
        curl_setopt($response, CURLOPT_POSTFIELDS, json_encode(['text'=> $this->text]));
        curl_setopt($response, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($response, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));

        $result = json_decode(curl_exec($response));

        curl_close($response);

        return $result->result->type ?? null;
    }
}
