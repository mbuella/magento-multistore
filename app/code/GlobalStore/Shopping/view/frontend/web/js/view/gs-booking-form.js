/*global define*/
define([
    'jquery',
    'Magento_Ui/js/form/form'
], function($,Component) {
    'use strict';
    return Component.extend({
        initialize: function () {
            this._super();
            // component initialization logic
            return this;
        },

        /**
         * Form submit handler
         *
         * This method can have any name.
         */
        onBookingFormSubmit: function() {
            // trigger form validation
            this.source.set('params.invalid', false);
            this.source.trigger('gsBookingForm.data.validate');

            // verify that form data is valid
            if (!this.source.get('params.invalid')) {
                // data is retrieved from data provider by value of the customScope property
                var bookingInfo = this.source.get('gsBookingForm');
                
                // send booking info to server for processing (and hopefully saving)
                this.processBookingInfo(bookingInfo);
                
                // do something with form data
                // console.dir(formData);
            }
        },
        
        processBookingInfo: function(bookingInfo) {
            // send ajax request
            
            $.ajax({
                type: "POST",
                url: "/shopping/booking/save",
                data: bookingInfo,
                success: function(status,data) {
                    // console.log(data);
                }
            });
        }
    });
});