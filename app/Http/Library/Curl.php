<?php

namespace App\Http\Library;

class Curl
{

    /**
     * Get for the API the possible values for a query.
     *
     * @return array
     */
    public static function call($q)
    {
        $apiUrl = 'https://api.tvmaze.com/search/shows?q=' . $q;
        $ch = \curl_init($apiUrl);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE); // Includes the header in the output

        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $array['response'] = \json_decode($result, true);
        $array['status'] = $status;
        // Close the connection
        \curl_close($ch);
        return $array;
    }
}
