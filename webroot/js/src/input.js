
class Input {
    constructor() {
        console.log('Input loaded');
        $('table[set_title_url]').on('dblclick', 'tr[scene_id] input[readonly]', Input.enableInput);
        $('table[set_title_url]').on('keydown', 'tr[scene_id] input:not([readonly])', Input.onKeyDown);
    }

    static enableInput(event) {
        $(event.currentTarget).removeAttr('readonly');
    }

    static onKeyDown(event) {
        if (event.keyCode !== 13) {
            return;
        }

        var url = $('table[set_title_url]').attr('set_title_url');
        var csrf = $('input[name=_csrfToken]').val();
        var params = {
            data: {
                scene_id: $(event.currentTarget).parents('tr[scene_id]').attr('scene_id'),
                title: $(event.currentTarget).val()
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-Token', csrf);
            },
            url: url,
            method: 'post'
        };

        $.ajax(params).done(Input.onSetTitleResult);
    }

    static onSetTitleResult(result) {
        var scene_id = result.data.id;
        var input = $('tr[scene_id="' + scene_id + '"] input');
        input.attr('readonly','readonly');
    }
}