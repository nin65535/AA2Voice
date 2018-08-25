<?php
//https://wavesurfer-js.org/
$this->Html->script("//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.6/wavesurfer.min.js", ['block' => 'script']);
?>

<div class="sticky-top card border-primary mb-2">
    <div class="card-header p-1">
        <div id="waveform"></div>
        <span class="duration"></span>
    </div>
    <div class="card-body p-1">

        <div class="text-center">
            <button type="button" class="btn btn-outline-primary py-0 btn-play"><i class="fas fa-play"></i> PLAY</button>
            <button type="button" class="btn btn-outline-primary py-0 btn-stop"><i class="fas fa-square"></i> STOP</button>
            <button type="button" class="btn btn-outline-primary py-0 btn-clear"><i class="far fa-square"></i> CLEAR</button>
        </div>
    </div>
</div>
