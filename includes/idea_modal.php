<?php
/**
 * Created by PhpStorm.
 * User: xheghun
 * Date: 02/01/2019
 * Time: 12:20 AM
 */
?>

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Share your idea with us</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3" id="id_form">
                    <div class="md-form mb-5">
                        <input type="text" id="name" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="id_name">Your Name</label>
                    </div>

                    <div class="md-form mb-4">
                        <input type="email" id="email" class="form-control validate">
                        <label data-error="wrong" data-success="right" for="id_email">Your Email</label>
                    </div>
                    <div class="md-form mb-4">
                        <textarea id="idea" class="md-textarea form-control"></textarea>
                        <label for="id_idea">Idea</label>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" id="submit" class="btn btn-block bg">Share</button>
                    </div>
            </div>
        </div>
    </div>
</div>
