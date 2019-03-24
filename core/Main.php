<?php

require_once 'Pontuation.php';

class Main {
    private const PATH_TO_TICKETS = './resources/tickets.json';

    public function Main() {
        Pontuation::build(Main::PATH_TO_TICKETS);
    }
}
