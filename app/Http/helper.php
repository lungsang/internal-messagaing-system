<?php
    if ( ! function_exists('cleanImgInMsg'))
    {   
        //Cleans the img src values in images uploaded in summernote editor and uploads the images
        function cleanImgInMsg($message = '')
        {
            $dom = new \DomDocument();
            $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
            $images = $dom->getElementsByTagName('img');
            foreach($images as $k => $img)
            {
                $data = $img->getAttribute('src');
                
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                //$data = base64_decode($data);
                $path = Illuminate\Support\Facades\Storage::putFile(
                    'messages', $data
                );
                dd($path);

                /*$image_name = "/messages/" .auth()->id().'/'.time().$k.'.png';
                $path = public_path() . $image_name;
                //file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);*/
            }
            $message = $dom->saveHTML();
            dd($message);
            return $message;
        }
    }


