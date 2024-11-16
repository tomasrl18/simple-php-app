<?php

declare(strict_types=1);

class NextMovie {
    public function __construct(
        private int $days_until,
        private string $title,
        private string $following_production,
        private string $release_date,
        private string $poster_url,
        private string $overview
    ) {}

    public function get_until_message(): string
    {
        $days = $this->days_until;

        return match (true) {
            $days === 0     => "HOY ES EL ESTRENO",
            $days === 1     => "MAÑANA ES EL ESTRENO",
            $days < 7       => "SE ESTRENA ESTA SEMANA",
            $days < 30      => "SE ESTRENA ESTE MES",
            default         => "$days DÍAS HASTA EL ESTRENO"
        };
    }

    public static function fetch_and_create_movie(string $api_url): NextMovie
    {
        $result = file_get_contents($api_url); // Si solo quieres hacer un GET de una API

        $data = json_decode($result, true);

        return new self(
            $data["days_until"],
            $data["title"],
            $data["following_production"]["title"] ?? "Desconocido",
            $data["release_date"],
            $data["poster_url"],
            $data["overview"]
        );
    }

    public function get_data()
    {
        return get_object_vars($this);
    }
}