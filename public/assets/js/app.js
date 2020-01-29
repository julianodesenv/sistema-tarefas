const APP_URL = "http://localhost:8000/";

$(document).ready(function () {
    $("input.dinheiro").maskMoney({showSymbol: true, symbol: "R$ ", decimal: ",", thousands: "."});
    $("input.mask-value").maskMoney({showSymbol: true, symbol: "", decimal: ",", thousands: "."});

    changeSelected();
});

// Masked Input
(function ($) {

    'use strict';

    if ($.isFunction($.fn['mask'])) {

        $(function () {
            $('[data-plugin-masked-input]').each(function () {
                var $this = $(this),
                    opts = {};

                var pluginOptions = $this.data('plugin-options');
                if (pluginOptions)
                    opts = pluginOptions;

                $this.themePluginMaskedInput(opts);
            });
        });

    }

}).apply(this, [jQuery]);


// Masked Input
(function (theme, $) {

    theme = theme || {};

    var instanceName = '__maskedInput';

    var PluginMaskedInput = function ($el, opts) {
        return this.initialize($el, opts);
    };

    PluginMaskedInput.defaults = {};

    PluginMaskedInput.prototype = {
        initialize: function ($el, opts) {
            if ($el.data(instanceName)) {
                return this;
            }

            this.$el = $el;

            this
                .setData()
                .setOptions(opts)
                .build();

            return this;
        },

        setData: function () {
            this.$el.data(instanceName, this);

            return this;
        },

        setOptions: function (opts) {
            this.options = $.extend(true, {}, PluginMaskedInput.defaults, opts);

            return this;
        },

        build: function () {
            this.$el.mask(this.$el.data('input-mask'), this.options);

            return this;
        }
    };

    // expose to scope
    $.extend(theme, {
        PluginMaskedInput: PluginMaskedInput
    });

    // jquery plugin
    $.fn.themePluginMaskedInput = function (opts) {
        return this.each(function () {
            var $this = $(this);

            if ($this.data(instanceName)) {
                return $this.data(instanceName);
            } else {
                return new PluginMaskedInput($this, opts);
            }

        });
    }

}).apply(this, [window.theme, jQuery]);

$('.btnDestroy').bind('click', function () {
    var route = $(this).attr('data-route');
    $('.btnConfirmeDestroy').attr('href', route);
});

$('.typeClient').change(function () {
    var type = $(this).val();
    if (type == 'pf') {
        $('.typePJ').hide();
        $('.typePF').fadeIn();
    } else {
        $('.typePF').hide();
        $('.typePJ').fadeIn();
    }
});

$('.uf').change(function () {
    var id = $(this).val();
    var varClass = $(this).attr('data-classe');

    $.ajax({
        type: "GET",
        url: "/ajax/cityByStateSelect/" + id,
        dataType: 'html',
        beforeSend: function () {
            $('.' + varClass).html('<option value="">Localizando...</option>');
        },
        success: function (html) {
            $('.' + varClass).html(html);
        }
    });

    return false;
});

$('#zip_code').blur(function () {
    var zip_code = $('#zip_code').val();
    zip_code = zip_code.replace(' ', '').replace('-', '');

    $.ajax({
        url: '/ajax/addressZipCode/' + zip_code,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data.success) {
                console.log(data.data.district);
                $('#address').val(data.data.address);
                $('#district').val(data.data.district);
                $('#number').focus();

                getSelectCities(data.data.state_id, data.data.city_id);
                $('#state_id option[value=' + data.data.state_id + ']').attr("selected", "selected");
            } else {
                alert(data.message);
            }
        }
    });

    return false;
});

function getSelectCities(state_id, city_id) {
    if (state_id !== '') {
        $.ajax({
            url: '/ajax/citiesSelect/' + state_id + '/' + city_id,
            type: 'GET',
            dataType: 'html',
            success: function (result) {
                $('#city_id').html(result);
            }
        });
    }
    return false;
}

function changeSelected() {
    $('.changeSelected').change(function () {
        var vClass = $(this).attr('data-classe');
        var id = $(this).val();
        var route = $(this).attr('data-route');
        route = route.replace('/0', '/' + id);
        $.ajax({
            type: "GET",
            url: route,
            beforeSend: function () {
                $('.' + vClass).html('<option value="">Pesquisando...</option>');
                //$('.' + vClass).prev('span').find('p').html('Localizando...');
            },
            success: function (result) {
                $('.' + vClass).html(result);
                /*

                //$('.opMultiSelect .btn-group').remove();

                $('.' + vClass).multiselect('destroy');
                $('.' + vClass).multiselect();

                $('.' + vClass).select2('destroy');
                $('.' + vClass).select2();
                */
                //getMultiSelect();
            }
        });
        return false;
    });
}