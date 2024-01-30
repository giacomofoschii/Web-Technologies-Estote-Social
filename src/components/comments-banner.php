<div class="modal fade" id="comments-banner" data-bs-backdrop="static" tabindex="-1" aria-labelledby="Commenti" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title h5" id="comments">Commenti</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi" onclick="location.reload()"></button>
            </div>
            <div class="modal-body modal-body-comment">
                <ul id="commentsList"></ul>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <form action="#" id="commentForm" method="POST">
                        <div class="row">
                            <div class="d-flex col-10 justify-content">
                                <input type="text" class="form-control w-100" id="commentText" name="commentText" aria-label="Commenta" placeholder="Aggiungi qui un commento" required>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-success" id="sendComment">Invia</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
