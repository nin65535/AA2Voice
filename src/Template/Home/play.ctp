<?php
$this->Html->script("//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/2.0.6/wavesurfer.min.js", ['block' => 'script']);
$this->append('script');
?>
<script>
    $(function () {
        var wavesurfer = WaveSurfer.create({
            container: '#waveform',
            scrollParent: true
        });
        wavesurfer.load('\\aa2v\\wav\\jg2p05_a00_00\\a00_h0_000_00_00.wav');

        $('i.fa-play').on('click', (event) => {
            wavesurfer.play();
        });
    });
</script>
<?php $this->end(); ?>
<div id="waveform"></div>

<i class="fa fa-play"></i>