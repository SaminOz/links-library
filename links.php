<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /************************************************************************
     * Links library
     * Copyright 2011 by Sam Moore
     *
     * Permission is hereby granted, free of charge, to any person obtaining
     * a copy of this software and associated documentation files (the
     * "Software"), to deal in the Software without restriction, including
     * without limitation the rights to use, copy, modify, merge, publish,
     * distribute, sublicense, and/or sell copies of the Software, and to
     * permit persons to whom the Software is furnished to do so, subject to
     * the following conditions:
     *
     * The above copyright notice and this permission notice shall be
     * included in all copies or substantial portions of the Software.
     *
     * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
     * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
     * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
     * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
     * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
     * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
     * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
     */

class Links {

    private $header_js = array();
    private $footer_js = array();
    private $base_css = array();
    private $CI;

    function __construct()
    {
        $this->CI =& get_instance();
    }

    // set $position as 'footer' or 'header'. Default is 'footer'
    public function set_javascript( $files, $position = 'footer' )
    {
        //load the config items into the links::property (if they are not already loaded)
        foreach ($this->CI->config->item("javascript_footer") as $javascript_footer)
        {
            if(!in_array( $javascript_footer, $this->footer_js))
                $this->footer_js[] = $javascript_footer;
        }

        foreach ($this->CI->config->item("javascript_header") as $javascript_header)
        {
            if(!in_array( $javascript_header, $this->header_js))
                $this->header_js[] = $javascript_header;
        }

        if( $position == 'footer' )
        {
            /**
             * check first if we have the script in the header - if so skip this step
             * header overwrites footer in the scheme of things.
             */

            if(!is_array( $files ) && in_array( $files, $this->header_js))
                continue;
            else if (!is_array( $files ) && !in_array( $files, $this->header_js))
                $this->footer_js[] = $files;
            else
            {
                foreach( $files as $file )
                {
                    //if not in footer and not in header add it
                    if(!in_array( $file, $this->footer_js) && !in_array( $file, $this->header_js))
                        $this->footer_js[] = $file;
                }
            }
        }
        else // must be header
        {
            /**
             * in header we need to know if the item is in header, but differently to
             * our action in footer; if we find it we will want to remove it and insert it into header
             */

            if(!is_array( $files ) && !in_array( $files, $this->footer_js))
                $this->header_js[] = $files;
            else if (!is_array( $files ) && in_array ($files, $this->footer_js))
            {
                foreach( $this->footer_js as $k => $v )
                {
                    if($v == $files)
                        unset($this->footer_js[$k]);
                }
                $this->header_js[] = $files;
            }
            else
            {
                foreach( $files as $file )
                {
                    if(!in_array( $file, $this->header_js) && !in_array( $file, $this->footer_js))
                        $this->header_js[] = $file;
                    else if (!in_array( $file, $this->header_js) && in_array( $file, $this->footer_js))
                    {
                        foreach( $this->footer_js as $k => $v )
                        {
                            if($v == $file)
                                unset($this->footer_js[$k]);
                        }
                        $this->header_js[] = $file;
                    }
                }
            }
        }
        //load up the properties
        $this->CI->config->set_item("javascript_header", $this->header_js);
        $this->CI->config->set_item("javascript_footer", $this->footer_js);
    }

    public function set_css ( $files )
    {
        foreach ($this->CI->config->item('css') as $css)
        {
            if(!in_array( $css, $this->base_css))
                $this->base_css[] = $css;
        }

        if(!is_array( $files ) && !in_array( $files, $this->base_css))
            $this->base_css[] = $files;
        else
        {
            foreach( $files as $file )
            {
                if(!in_array( $file, $this->base_css))
                    $this->base_css[] = $file;
            }
        }

        $this->CI->config->set_item('css', $this->base_css);
    }
}
