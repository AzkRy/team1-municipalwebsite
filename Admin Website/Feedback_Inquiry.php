<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback & Inquiry</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../Admin Website/CSS/Feedback_Inquiry.css">

</head>
<body>
    <section>
        <div class="top-part">
            <div class="card-container">
                <div class="card feedback-card">
                    <div class="card-title">FEEDBACK</div>
                    <div class="card-count">10</div>
                </div>
                <div class="card inquiry-card">
                    <div class="card-title">INQUIRIES</div>
                    <div class="card-count">15</div>
                </div>
            </div>
        </div>
    </section>

    <section class="feedback-section"> 
        <div class="feedback">
            <div class="feedback-header">
                <span class="feedback-title">FEEDBACK</span>
                <div class="feedback-controls">
                    <span>Sort</span>
                    <select>
                        <option>Newest</option>
                        <option>Oldest</option>
                    </select>
                </div>
            </div>
            <div class="feedback-list">
                <div class="feedback-item">
                    <span class="feedback-user">Anonymous</span>
                    <span class="feedback-message">Ganda ng gov site, Talaga!</span>
                    <button class="delete-btn" id="deleteFeedback" onclick=openDelete()><i class="fas fa-trash"></i></button>
                </div>
                <div class="feedback-item">
                    <span class="feedback-user">Juan</span>
                    <span class="feedback-message">Tama na.</span>
                    <button class="delete-btn" id="deleteFeedback" onclick=openDelete()><i class="fas fa-trash"></i></button>
                </div>
                <div class="feedback-item">
                    <span class="feedback-user">Juan</span>
                    <span class="feedback-message">Ou,Tama na.</span>
                    <button class="delete-btn" id="deleteFeedback" onclick=openDelete()><i class="fas fa-trash"></i></button>
                </div>
                <div class="feedback-item">
                    <span class="feedback-user">Juan</span>
                    <span class="feedback-message">Legit, Tama na.</span>
                    <button class="delete-btn" id="deleteFeedback" onclick=openDelete()><i class="fas fa-trash"></i></button>
                </div>
                <div class="feedback-item">
                    <span class="feedback-user">Maria</span>
                    <span class="feedback-message">napapagod na ko.</span>
                    <button class="delete-btn" id="deleteFeedback" onclick=openDelete()><i class="fas fa-trash"></i></button>
                </div>
                <div class="feedback-item">
                    <span class="feedback-user">Jose</span>
                    <span class="feedback-message">Feedback message #sleep.</span>
                    <button class="delete-btn" id="deleteFeedback" onclick=openDelete()><i class="fas fa-trash"></i></button>
                </div>
                <div class="feedback-item">
                    <span class="feedback-user">Jose</span>
                    <span class="feedback-message">Feedback message #sleep.</span>
                    <button class="delete-btn" id="deleteFeedback" onclick=openDelete()><i class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>
    </section>

    <section class="feedback-section"> 
        <div class="inquiry">
            <div class="inquiry-header">
                <span class="inquiry-title">INQUIRIES</span>
                <div class="feedback-controls">
                    <span>Sort</span>
                    <select>
                        <option>Newest</option>
                        <option>Oldest</option>
                    </select>
                </div>
            </div>
            <div class="feedback-list">
                <div class="feedback-item">
                    <span class="feedback-user">Anonymous</span>
                    <span class="feedback-message">Pano ba to?</span>
                    <button class="delete-btn" id="deleteFeedback" onclick=openDelete()><i class="fas fa-trash"></i></button>
                </div>
                <div class="feedback-item">
                    <span class="feedback-user">Juan</span>
                    <span class="feedback-message">Sheeshable san nakikita yun</span>
                    <button class="delete-btn" id="deleteFeedback" onclick=openDelete()><i class="fas fa-trash"></i></button>
                </div>
                <div class="feedback-item">
                    <span class="feedback-user">Jose</span>
                    <span class="feedback-message">Inquiry Message</span>
                    <button class="delete-btn" id="deleteFeedback" onclick=openDelete()><i class="fas fa-trash"></i></button>
                </div>
                <div class="feedback-item">
                    <span class="feedback-user">Mae</span>
                    <span class="feedback-message">Inquiry Message</span>
                    <button class="delete-btn" id="deleteFeedback" onclick=openDelete()><i class="fas fa-trash"></i></button>
                </div>
                <div class="feedback-item">
                    <span class="feedback-user">Maria</span>
                    <span class="feedback-message">napapagod na ko.</span>
                    <button class="delete-btn" id="deleteFeedback" onclick=openDelete()><i class="fas fa-trash"></i></button>
                </div>
                <div class="feedback-item">
                    <span class="feedback-user">Jose</span>
                    <span class="feedback-message">Inquiry message.</span>
                    <button class="delete-btn" id="deleteFeedback" onclick=openDelete()><i class="fas fa-trash"></i></button>
                </div>
                <div class="feedback-item">
                    <span class="feedback-user">Jose</span>
                    <span class="feedback-message">Ano ang sleep?</span>
                    <button class="delete-btn" id="deleteFeedback" onclick=openDelete()><i class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>
    </section>

    <div class="modal-container-delete" id="modal_Container_delete">
        <div class="modal-delete">
            <form action="Feedback_Inquiry.php">
                <h2>Delete Message</h2>
                <p>Are you sure you want to <strong style="color: var(--important-section);">Delete</strong> this message?</p>
                <div class="button">
                    <button type="submit" id="deleteUser">Delete</button>
                    <button id="cancelDelete" onclick=cancel()>Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../Admin Website/JavaScripts/Feedback_Inquiry.js"></script>
</body>
</html>