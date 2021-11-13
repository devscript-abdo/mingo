<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
class CssMinCommand extends Command
{
    protected $name = 'cssmin';
    protected $description = 'Css minification commandline tool';


    protected $files;
    protected $output_path;
    protected $comments;
    protected $concat;

    public function __construct(){
        parent::__construct();
    }

    private function init(){
        $this->files = $this->argument('files');
        $this->output_path = $this->argument('output');
        $this->comments = $this->option('comments');
        $this->concat = $this->option('concat');

       // $this->progressbar = $this->getHelperSet()->get('progress');
       // $this->progressbar->start($this->output, count($this->files) );
    }

    public function handle(){
        $this->init();
        $this->processFiles();
    }

    private function processFiles(){
        $css_result = [];

        foreach ( $this->files as $file ) {
            //read file content
            $file_content = file_get_contents( $file );
            //minify CSS and add it to the result array
            $css_result[] = $this->minify( $file_content, $this->comments );
            // sleep for one second to see the effect
            //sleep(1);
           // $this->progressbar->advance();
        }//foreach

        if( $this->concat ){
            $css_concat = implode( PHP_EOL, $css_result );
            file_put_contents($this->output_path . '/all.min.css', $css_concat);
        }//if
        else{
            foreach ($css_result as $key => $css) {
                //remove '.css' to add '.min.css'
                $filename = basename( $this->files[$key], '.css' ) . '.min.css';
                
                file_put_contents($this->output_path . '/' . $filename, $css);
            }//for
        }//else

      //  $this->progressbar->finish();
        $this->info('Done');
    }//processFiles

    private function minify( $css, $comments ){
        // Normalize whitespace
        $css = preg_replace( '/\s+/', ' ', $css );

        // Remove comment blocks, everything between /* and */, unless
        // preserved with /*! ... */
        if( !$comments ){
            $css = preg_replace( '/\/\*[^\!](.*?)\*\//', '', $css );
        }//if
        
        // Remove ; before }
        $css = preg_replace( '/;(?=\s*})/', '', $css );

        // Remove space after , : ; { } */ >
        $css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );

        // Remove space before , ; { } ( ) >
        $css = preg_replace( '/ (,|;|\{|}|\(|\)|>)/', '$1', $css );

        // Strips leading 0 on decimal values (converts 0.5px into .5px)
        $css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );

        // Strips units if value is 0 (converts 0px to 0)
        $css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );

        // Converts all zeros value into short-hand
        $css = preg_replace( '/0 0 0 0/', '0', $css );

        // Shortern 6-character hex color codes to 3-character where possible
        $css = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css );

        return trim( $css );
    
    }//minify

    protected function getArguments(){
        return array(
            array(
                'output', 
                InputArgument::REQUIRED,
                'Path to output directory'
            ),
            array(
                'files', 
                InputArgument::IS_ARRAY | InputArgument::OPTIONAL ,
                "List of css files to minify"
            ),
        );
    }

    protected function getOptions(){
        return array(
            array('comments', 'c', InputOption::VALUE_NONE, 'Don\'t remove comments' , null),
            array('concat', null, InputOption::VALUE_NONE, 'Concat the minified result to one file' , null),
        );
    }
}
