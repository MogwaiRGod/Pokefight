<?php
function affichageSequentiel($data) {
    // vide le cache
    flush();
    // interrompt le programme pendant x µs
    usleep(500000);
    echo $data;
    return;
}