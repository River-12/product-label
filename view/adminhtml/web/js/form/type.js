define([
    'jquery',
    'underscore',
    'uiRegistry',
    'Magento_Ui/js/form/element/select'
], function ($, _, uiRegistry, select) {
    'use strict';
    return select.extend({

        initialize: function (){
            var status = this._super().initialValue;
            this.fieldDepend(status);
            return this;
        },


        /**
         * On value change handler.
         *
         * @param {String} value
         */
        onUpdate: function (value) {

            this.fieldDepend(value);
            return this._super();
        },

        /**
         * Update field dependency
         *
         * @param {String} value
         */
        fieldDepend: function (value) {
            setTimeout(function () {
                console.log(value);
                var labelText = uiRegistry.get('index = label_text');
                var image = uiRegistry.get('index = image');
                var shape = uiRegistry.get('index = label_shape');
                var tcolor = uiRegistry.get('index = text_color');
                var bcolor = uiRegistry.get('index = background_color');


                if (value == "text") {
                    labelText.visible(true);
                    shape.visible(true);
                    tcolor.visible(true);
                    bcolor.visible(true);
                    image.visible(false);
                }
                if(value == "image") {
                    labelText.visible(false);
                    shape.visible(false);
                    tcolor.visible(false);
                    bcolor.visible(false);
                    image.visible(true);
                }
            }, 500);
            return this;
        }
    });
});