!(function (i) {
    "use strict";
    function a() {}
    (a.prototype.init = function () {
        i(".select2").select2(),
            i(".select2-limiting").select2({ maximumSelectionLength: 2 }),
            i(".select2-search-disable").select2({
                minimumResultsForSearch: 1 / 0,
            }),
            i(".colorpicker-default").colorpicker({ format: "hex" }),
            i(".colorpicker-rgba").colorpicker(),
            i("#colorpicker-horizontal").colorpicker({
                color: "#88cc33",
                horizontal: !0,
            }),
            i("#colorpicker-inline").colorpicker({
                color: "#DD0F20",
                inline: !0,
                container: !0,
            });
        var t = {};
        i('[data-toggle="touchspin"]').each(function (a, e) {
            var n = i.extend({}, t, i(e).data());
            i(e).TouchSpin(n);
        }),
            i("input[name='demo3_21']").TouchSpin({
                initval: 40,
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary",
            }),
            i("input[name='demo3_22']").TouchSpin({
                initval: 40,
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary",
            }),
            i("input[name='demo_vertical']").TouchSpin({ verticalbuttons: !0 }),
            i("input#defaultconfig").maxlength({
                warningClass: "badge badge-info",
                limitReachedClass: "badge badge-warning",
            }),
            i("input#thresholdconfig").maxlength({
                threshold: 20,
                warningClass: "badge badge-info",
                limitReachedClass: "badge badge-warning",
            }),
            i("input#moreoptions").maxlength({
                alwaysShow: !0,
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger",
            }),
            i("input#alloptions").maxlength({
                alwaysShow: !0,
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger",
                separator: " out of ",
                preText: "You typed ",
                postText: " chars available.",
                validate: !0,
            }),
            i("textarea#textarea").maxlength({
                alwaysShow: !0,
                warningClass: "badge badge-info",
                limitReachedClass: "badge badge-warning",
            }),
            i("input#placement").maxlength({
                alwaysShow: !0,
                placement: "top-left",
                warningClass: "badge badge-info",
                limitReachedClass: "badge badge-warning",
            });
    }),
        (i.AdvancedForm = new a()),
        (i.AdvancedForm.Constructor = a);
})(window.jQuery),
    (function () {
        "use strict";
        window.jQuery.AdvancedForm.init();
    })();
