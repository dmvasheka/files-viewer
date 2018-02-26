'use strict';
let Folders = {
    settings: {
        test: 'folders'
    },

    init: function () {
        this.getFolderStructure();
    },

    getFolderStructure: function () {
        $.ajax({
            url: '/folders/structure',
            method: 'GET',
            success: (result) => {
                //let json = JSON.parse(result);
                //console.log(json);
                //console.log(result);
                console.log(result);
                $.map(result, (val, key) => {
                    $('.sidebar').append('<div data-id="' + key + '" class="folder" data-name="' + val.name + '">' +
                        val.name + (val.not_empty ? '<span> + </span>' : '') +
                        '</div>');
                    console.log(val.name)
                })

            }
        });
    }
};
