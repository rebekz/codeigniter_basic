<?php
$config = array(
                 'addUsers' => array(
                                    array(
                                            'field' => 'username',
                                            'label' => 'username',
                                            'rules' => 'trim|required'
                                         ),
                                    array(
                                            'field' => 'password',
                                            'label' => 'password',
                                            'rules' => 'trim|required|min_length[5]'
                                         ),
                                    array(
                                            'field' => 'password_again',
                                            'label' => 'Reenter password',
                                            'rules' => 'trim|required|matches[password]'
                                         ),
                                    array(
                                            'field' => 'nama_lengkap',
                                            'label' => 'Full Name',
                                            'rules' => 'trim|required'
                                         ),										 
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email',
                                            'rules' => 'valid_email'
                                         ),
                                    array(
                                            'field' => 'level',
                                            'label' => 'level',
                                            'rules' => 'required'
                                         )
                                    ),
                 'editUsers' => array(
                                    array(
                                            'field' => 'password',
                                            'label' => 'password',
                                            'rules' => 'trim|min_length[5]'
                                         ),
                                    array(
                                            'field' => 'password_again',
                                            'label' => 'Reenter password',
                                            'rules' => 'trim|matches[password]'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'Email',
                                            'rules' => 'valid_email'
                                         ),
                        			array(
                                            'field' => 'nama_lengkap',
                                            'label' => 'Full Name',
                                            'rules' => 'trim|required'
                                         )
                                    ),
                                    
                 'addPages' => array(
                                    array(
                                            'field' => 'judul',
                                            'label' => 'Page Title',
                                            'rules' => 'required'
                                         ),
                                    ),
                  

                                    
                 'addNews' => array(
                                    array(
                                            'field' => 'judul',
                                            'label' => 'judul',
                                            'rules' => 'required'
                                         ),
                                    ),																		
  

                                     
               );
               
               
?>