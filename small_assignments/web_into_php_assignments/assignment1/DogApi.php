<?php
    /**
     * DOG API class with cURL
     * this handles the communication with the API and this is way how we can access our data
     */
    class DogApi{
        private $baseUrl;
        private $apiKey;

        public function __construct($baseUrl, $apiKey){
            $this->baseUrl = $baseUrl;
            $this->apiKey = $apiKey;
        }
        /**
         * Make the request to the DogAPi where I can get the image and the id of it
         */
        private function request($endpoint){
            $url = $this->baseUrl . $endpoint;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, true);
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                http_response_code(400);
                throw new Exception("cURL Error: " . curl_error($ch));
            }
            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($statusCode == 404) {
                throw new Exception("Dog info is not Found");
            }
            return json_decode($response, true);
        }

        private function matching_all_info() {
            $final_data = [];

            // Get 20 random images
            $general_info = $this->request("/images/search?limit=20");

            /**
             * The problem with this api is that it's not returning all useful info using just using one request.
             * But I implemented a loop where we go by a list of images and check their ids, and it's like a key to
             * get additional info for a specific dog breed. Each time, we're requesting information
             * for just one dog, here's a curl that I tried to :
             * https://docs.thedogapi.com/docs/examples/images#list-breeds-for-an-image
             * I know, sounds a little bit complicated, but I love dogs :)
             */

            foreach ($general_info as $img) {
                $imageId = $img['id'];
                $imageUrl = $img['url'] ?? null;

                // Get breed info for this specific image
                $breed_info = $this->request("/images/{$imageId}/breeds");
                $breed = $breed_info[0] ?? null;

                $final_data[] = [
                    "image_url"   => $imageUrl,
                    "name"        => $breed['name'] ?? null, // if a value is not found, putting null
                    "temperament" => $breed['temperament'] ?? null,
                    "life_span"   => $breed['life_span'] ?? null,
                    "origin"      => $breed['origin'] ?? null
                ];
            }

            return $final_data;
        }

        public function getdata(){
            return $this->matching_all_info();
        }
    }
?>