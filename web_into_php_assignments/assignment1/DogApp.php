<?php
    /*
     * Dog Api class
     * This controls the main logic of our app
     */
    class DogApp{
        private $api;
        public function __construct($api){
            $this->api = $api;
        }

        public function show_dog_posting(){
            $dogs = $this->api->getdata();
            if (empty($dogs)){
                echo "<p> No dogs info </p>";
                return;
            }
        ?>
            <section id="dog_content">
            <?php
            foreach ($dogs as $dog){
                $url = htmlspecialchars($dog['image_url'] ?? "Link is not found");
                $name = htmlspecialchars($dog['name'] ?? "Name is not found");
                $temperament = htmlspecialchars($dog['temperament'] ?? "Temperament is not found");
                $life_span = htmlspecialchars($dog['life_span'] ?? "Life span is not found");
                $origin = htmlspecialchars($dog['origin'] ?? "Origin is not found");
                if ($name === "Name is not found") {
                    continue;
                }
                else {
                    echo "<div>";
                    echo "<img class='dog-img' src='{$url}' alt='{$name}'>";
                    echo "<h3>{$name}</h3>";
                    echo "<p>{$life_span}, {$origin}, {$temperament}</p>";
                    echo "</div>";
                }
            } ?>
            </section>
        <?php
        }
    }
?>