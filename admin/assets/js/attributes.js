/**
 * Created by adrian-webberty on 1/07/15.
 */
(function ($)
{
    'use strict';

    var js_list_attributes                  = $ ( '.js-list-attributes' );
    var js_attribute_name                   = $ ( '.js-attribute-name' );
    var js_attribute_type                   = $ ( '.js-attribute-type' );
    var js_attribute_slug                   = $ ( '.js-attribute-slug' );
    var js_attribute_description            = $ ( '.js-attribute-description' );
    var js_attribute_excerpt                = $ ( '.js-attribute-excerpt' );
    var js_attribute_css                    = $ ( '.js-attribute-css' );
    var js_attribute_status                 = $ ( '.js-attribute-status' );
    var js_attribute_property_view_column   = $ ( '.js-attribute-property-view-column' );
    var js_attribute_property_search_filter = $ ( '.js-attribute-property-search-filter' );
    var js_attribute_section                = $ ( '#js-attribute-section' );
    var target                              = $ ( 'html,body' );


    function sortable_refresh ()
    {


        $ ( '.js-list-attributes,.js-list-attribute-options' ).sortable ( {

            revert               : true ,
            forcePlaceholderSize : true ,
            opacity              : .6 ,
            stop                 : function (event , ui)
            {
                var attribute_order         = [];
                var attribute_options_order = [];


                // Update attributes order ....
                if ( ui.item.hasClass ( 'js-widget-type-li' ) )
                {

                    $ ( '.js-widget-type-li' ).each ( function (i , v)
                                                      {

                                                          attribute_order.push ( $ ( v ).attr ( 'data-attribute-type-id' ) );

                                                      }
                    );

                    var data = {
                        'action'            : 'update_attributes_order'
                        , 'attribute_order' : attribute_order
                    };

                    $.post ( ajax_object.ajax_url , data );

                }

                // Update attribute options order ...
                if ( ui.item.hasClass ( 'js-attribute-option-li' ) )
                {

                    $ ( '.js-attribute-option-li' ).each ( function (i , v)
                                                           {

                                                               attribute_options_order.push ( $ ( v ).attr ( 'data-option-attribute-id' ) );

                                                           }
                    );

                    var data2 = {
                        'action'                    : 'update_attribute_options_order'
                        , 'attribute_type_id'       : ui.item.attr ( 'data-option-attribute-type-id' )
                        , 'attribute_options_order' : attribute_options_order
                    };

                    $.post ( ajax_object.ajax_url , data2 );
                }


                $ ( this ).removeClass ( 'hover-style' );

            }

            ,
            over : function ()
            {

                $ ( this ).addClass ( 'hover-style' );
            }
            ,
            out  : function ()
            {
                $ ( this ).addClass ( 'hover-style' );
            }


        } );


    }


    /**
     *  When everything is ready ...
     */
    $ ( document ).on ( 'ready' , function ()
    {
        sortable_refresh ();

    } );


    /**
     * Inserting new attribute type ...
     */
    $ ( document ).on ( 'click' , '.js-insert-attribute' , function ()
    {

        $ ( '.form-required' ).removeClass ( 'form-invalid' );

        var data = {
            'action'                             : 'insert_attribute'
            , 'attribute_name'                   : js_attribute_name.val ()
            , 'attribute_type'                   : js_attribute_type.val ()
            , 'attribute_slug'                   : js_attribute_slug.val ()
            , 'attribute_description'            : js_attribute_description.val ()
            , 'attribute_excerpt'                : js_attribute_excerpt.val ()
            , 'attribute_css'                    : js_attribute_css.val ()
            , 'attribute_status'                 : js_attribute_status.val()
            , 'attribute_property_view_column'   : js_attribute_property_view_column.is ( ':checked' )
            , 'attribute_property_search_filter' : js_attribute_property_search_filter.is ( ':checked' )
        };

        console.log ( data )

        // We can also pass the url value separately from ajaxurl for front end AJAX implementations
        $.post ( ajax_object.ajax_url , data , function (response)
        {

            if ( response.error )
            {

                $ ( response.error ).parents ( '.form-required' ).addClass ( 'form-invalid' );

                target.animate ( { scrollTop : 0 } , 1000 );

            }
            else if ( response.success )
            {

                var response_content = response.content;


                $ ( ".no-attribute" ).remove ();


                js_list_attributes.append ( response_content );

                target.animate ( { scrollTop : target.height () } , 1000 );


            }

        } , 'json' );


    } );

    /**
     * Removing attribute ...
     */
    $ ( document ).on ( 'click' , '.js-remove-attribute-widget' , function (e)
    {
        e.preventDefault ();

        var this_att = $ ( this ).parents ( '.js-widget-type-li' );
        if ( confirm ( ajax_object.remove_attribute_alert ) )
        {

            var data = {
                'action'              : 'remove_attribute'
                , 'attribute_type_id' : this_att.attr ( 'data-attribute-type-id' )
            };

            // We can also pass the url value separately from ajaxurl for front end AJAX implementations
            $.post ( ajax_object.ajax_url , data , function (response)
            {

                if ( response.success )
                {

                    $ ( this_att ).fadeOut ( 300 , function ()
                    {

                        $ ( this ).remove ();

                        // If there is no attribute option then add a default content
                        if ( js_list_attributes.children ().length == 0 )
                        {

                            js_list_attributes.html ( '<div class="no-attribute">' + ajax_object.no_attribute_alert + '</div>' );

                        }

                    } );

                }

            } , 'json' );

        }

    } );

    /**
     * Open / Close Attribute box ...
     */
    $ ( document ).on ( 'click' , '.js-open-close-attribute' , function ()
    {

        var this_att      = $ ( this ).parents ( '.js-widget-type-li' );
        var $this         = $ ( this );
        var slide_element = $this;

        var data = {
            'action'              : 'toggle_attribute'
            , 'attribute_type_id' : this_att.attr ( 'data-attribute-type-id' )
        };

        // We can also pass the url value separately from ajaxurl for front end AJAX implementations
        $.post ( ajax_object.ajax_url , data , function (response)
        {

            if ( response.success )
            {

                $this.parents ( '.js-widget-type-li' ).find ( '.js-widget-block-content' ).slideToggle ( "slow" , function ()
                {

                    if ( slide_element.hasClass ( 'dashicons-arrow-up' ) )
                    {

                        slide_element.removeClass ( 'dashicons-arrow-up' ).addClass ( 'dashicons-arrow-down' );

                    }
                    else
                    {

                        slide_element.removeClass ( 'dashicons-arrow-down' ).addClass ( 'dashicons-arrow-up' );

                    }

                } );

            }

        } , 'json' );

    } );


    /**
     * Add Attribute Option
     */
    $ ( document ).on ( 'click' , '.js-add-new-attribute-option' , function (e)
    {

        e.preventDefault ();

        var $this           = $ ( this );
        var this_att        = $this.parents ( '.js-widget-type-li' );
        var att_type        = this_att.attr ( 'data-attribute-type' );
        var att_id          = this_att.attr ( 'data-attribute-type-id' );
        var att_name        = this_att.attr ( 'data-attribute-type-name' );
        var att_description = this_att.attr ( 'data-attribute-type-description' );

        var data = {
            'action'            : 'insert_attribute_option'
            , 'att_type'        : att_type
            , 'att_id'          : att_id
            , 'att_name'        : att_name
            , 'att_description' : att_description

        };

        // We can also pass the url value separately from ajaxurl for front end AJAX implementations
        $.post ( ajax_object.ajax_url , data , function (response)
        {

            var $this = $ ( "[data-attribute-type-id-options='" + att_id + "']" );

            $this.find ( '.no-attribute-option' ).remove ();

            $this.append ( response );

        } );

    } );


    /**
     * Remove attribute option...
     */
    $ ( document ).on ( 'click' , '.js-remove-attribute-option' , function (e)
    {

        e.preventDefault ();

        var this_att_opt        = $ ( this ).parents ( '.js-attribute-option-li' );
        var attribute_option_id = $ ( this ).parents ( '.js-attribute-option-li' ).attr ( 'data-option-attribute-id' );
        var attribute_type_id   = $ ( this ).parents ( '.js-list-attribute-options' ).attr ( 'data-attribute-type-id-options' );

        var data = {
            'action'                : 'remove_attribute_option'
            , 'attribute_option_id' : attribute_option_id
            , 'attribute_type_id'   : attribute_type_id
        };

        // We can also pass the url value separately from ajaxurl for front end AJAX implementations
        $.post ( ajax_object.ajax_url , data , function (response)
        {

            if ( confirm ( ajax_object.remove_attribute_option_alert ) )
            {

                $ ( this_att_opt ).fadeOut ( 300 , function ()
                {

                    $ ( this ).remove ();

                    if ( $ ( "[data-attribute-type-id-options='" + attribute_type_id + "']" ).children ().length == 0 )
                    {

                        $ ( "[data-attribute-type-id-options='" + attribute_type_id + "']" ).html ( '<div class="no-attribute-option">' + ajax_object.attribute_no_option_alert + '</div>' );

                    }

                } );

            }

        } );

    } );

    /**
     * Switch between attribute "Options" and "Details" tabs ...
     */
    $ ( document ).on ( 'click' , '.js-att-tabs' , function ()
    {

        var tab_to_show = $ ( this ).attr ( 'data-att-tab' );
        $ ( ".js-att-tabs" ).removeClass ( "js-active-tab-item" );
        $ ( this ).addClass ( "js-active-tab-item" );
        $ ( ".js-att-tab" ).removeClass ( "js-active-tab" ).hide ();
        $ ( '.' + tab_to_show ).addClass ( "js-active-tab" ).show ();

    } );


    /**
     * Update single attribute
     */
    $ ( document ).on ( 'click' , '.js-update-attribute-option' , function (e)
    {


    } );

    /**
     * Update single attribute
     */
    $ ( document ).on ( 'click' , '.js-save-attributes' , function ()
    {

        //...
        js_attribute_section.submit ();

    } )


})
( jQuery );
