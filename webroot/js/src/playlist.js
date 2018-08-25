class PlayList {
    constructor() {
        'use strict';
        console.log('PlayList loaded');

        this.wavesurfer = WaveSurfer.create({
            container: '#waveform',
            normalize: true,
            scrollParent: true,
            waveColor: '#007bff'
        });


        $('table.table-scene').on('dblclick', 'th.scene-group', this.playSceneGroup.bind(this));
        $('table.table-scene').on('click', 'th.scene-group', this.selectSceneGroup.bind(this));

        $('.btn-clear').on('click', this.clear.bind(this));
        $('.btn-play').on('click', this.play.bind(this));
        $('.btn-stop').on('click', this.stop.bind(this));
        this.wavesurfer.on('finish', this.onFinish.bind(this));
    }

    selectSceneGroup(event) {
        var td = $(event.currentTarget).parents('tbody[scene_group]').find('td[voice_url]');
        td.addClass('in-list');
        this.update();
    }

    playSceneGroup(event) {
        this.clear();
        this.selectSceneGroup(event);
        this.playFirst();
    }

    clear(event) {
        $('td[voice_url]').removeClass('in-list');
        $('td[voice_url]').removeClass('in-play');
        this.update();
    }

    update(event) {
        this.list = this.getList();
    }

    getList() {

        var list = $('td[voice_url].in-list').sort(function (a, b) {
            if ($(a).attr('scene_group') > $(b).attr('scene_group')) {
                return 1;
            }
            if ($(a).attr('scene_group') < $(b).attr('scene_group')) {
                return -1;
            }
            if (Number($(a).attr('personality_id')) > Number($(b).attr('personality_id'))) {
                return 1;
            }
            if (Number($(a).attr('personality_id')) < Number($(b).attr('personality_id'))) {
                return -1;
            }
            if ($(a).attr('voice_url') > $(b).attr('voice_url')) {
                return 1;
            }
            if ($(a).attr('voice_url') < $(b).attr('voice_url')) {
                return -1;
            }
        }).map(function (i, td) {
            return $(td).attr('voice_url');
        });


        return list.toArray();
    }

    play(event) {
        var current_url = $('td[voice_url].in-play').attr('voice_url');
        if (current_url) {
            this.wavesurfer.play();
        } else {
            this.playFirst();
        }
    }

    playFirst() {
        this.playUrl(this.list[0]);
    }

    playNext() {
        var current_url = $('td[voice_url].in-play').attr('voice_url');
        var current_id = this.list.indexOf(current_url);

        if (current_id === -1) {
            return this.playFirst();
        }

        var next_url = this.list[current_id + 1];
        if (next_url) {
            return this.playUrl(next_url);
        } else {
            return this.stop();
        }
    }

    playUrl(url) {
        this.stop();
        $('td[voice_url="' + url + '"]').addClass('in-play');
        this.wavesurfer.load(url);
        var that = this;
        this.wavesurfer.once('ready', function () {
            that.initDuration();
            that.wavesurfer.play();
        });
    }
    
    
    initDuration(){
        var duration = Math.ceil(this.wavesurfer.getDuration() * 1000);
        $('.duration').html( duration );
    }

    stop() {
        $('td[voice_url]').removeClass('in-play');
        this.wavesurfer.empty();
    }

    onFinish(event) {
        this.playNext();
    }
}