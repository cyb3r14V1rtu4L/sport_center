<?php
class AppController extends Controller {
    var $components = array(
        'Auth' => array(
            'autoRedirect' => false,
        ),
        'Session',
    );
    var $helpers = array(
        'Html',
        'Form',
        'Session',
        'Ajax',
    );
        
    /*function beforeFilter()
    {
       parent::beforeFilter();
       $this->Auth->allow(array('*'));   
    }*/
    
    public function beforeRender()
    {
        // only compile it on development mode
        if (Configure::read('debug') > 0)
        {
            // import the file to application
            App::import('Vendor', 'lessc');

            // set the LESS file location
            $less = ROOT . DS . APP_DIR . DS . 'webroot' . DS . 'less' . DS . 'main.less';

            // set the CSS file to be written
            $css = ROOT . DS . APP_DIR . DS . 'webroot' . DS . 'css' . DS . 'main.css';

            // compile the file
            lessc::ccompile($less, $css);
        }
        parent::beforeRender();
    }
    function afterFilter()
    {
        # Update User last_access datetime
        if ($this->Auth->user())
        {
            $this->loadModel('User');
            $this->User->id = $this->Auth->user('id');
            $this->User->saveField('last_access', date('Y-m-d H:i:s'));
        }
    }
}
