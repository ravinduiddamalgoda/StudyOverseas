<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Study Overseas - User Chat</title>

    <!--include Stylesheets -->
    <?php $this->load->view('inc/admin/admin_styles'); ?>

</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        <?php $this->load->view('inc/counsellor/left_menu'); ?>
        <!--end sidebar-wrapper-->
        <!--header-->
        <?php $this->load->view('inc/counsellor/header'); ?>
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!-- data table  -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0">Chat with <?php echo $student_name?></h4>
                            </div>
                            <hr />
                            <div class="table-responsive">
                                <div class="p-1 chat" id="chat-window">
                                    <!-- <div class="chat-line _flex-start">
                                        <div class="chat-bubble">
                                            <amla class="chat-bubble__text">Hello sfnhoauh asdad adssakdoadkap
                                                asmddlkadsmaskmd alksmdlamwdia asdmd lakmda</p>
                                                <p class="chat-bubble__date">2024-03-05 00:00:00</p>
                                        </div>
                                    </div> -->
                                </div>
                                <hr />
                                <form action="" onsubmit="sendMessage(event)">
                                    <div class="form-group mb-3">
                                        <!-- contain input and submit button horizontally -->
                                        <div class="input-group">
                                            <input type="text" name="message" class="form-control" placeholder="Message"
                                                required />
                                            <button type="submit" class="btn btn-primary bx bx-send"></button>
                                        </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <!--end page-content-wrapper-->
            </div>
            <!--end page-wrapper-->
            <!--start overlay-->
            <div class="overlay toggle-btn-mobile"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                    class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <!--footer -->
            <?php $this->load->view('inc/counsellor/footer'); ?>
            <!-- end footer -->
        </div>
        <!-- end wrapper -->
        <!--start switcher-->
        <?php $this->load->view('inc/web/theme_switcher'); ?>
        <!--end switcher-->
        <!-- JavaScript -->

        <!-- include Scripts  -->
        <?php $this->load->view('inc/admin/admin_scripts'); ?>

        <!--Data Tables js-->
        <script src="<?php echo base_url(); ?>assets/admin/plugins/datatable/js/jquery.dataTables.min.js"></script>
        <script type="module">
            import Notify from '<?php echo base_url(); ?>assets/admin/js/notify.js';

            async function getMessages() {
                await new Promise(resolve => {
                    $.ajax({
                        url: '<?php echo base_url("/chat/messages/") . $this->session->userdata('user_id') . "/" . $student_id ?>',
                        type: 'GET',
                        success: function (data) {
                            const messages = JSON.parse(data).messages;
                            const chatWindow = document.getElementById('chat-window');
                            chatWindow.innerHTML = '';
                            messages.forEach(message => {
                                const chatLine = document.createElement('div');
                                chatLine.classList.add('chat-line');
                                chatLine.classList.add(message.sender_id == <?php echo $this->session->userdata('user_id') ?> ? '_flex-end' : '_flex-start');
                                const chatBubble = document.createElement('div');
                                chatBubble.classList.add('chat-bubble');
                                const chatText = document.createElement('p');
                                chatText.classList.add('chat-bubble__text');
                                chatText.innerText = message.message;
                                const chatDate = document.createElement('p');
                                chatDate.classList.add('chat-bubble__date');
                                chatDate.innerText = message.sent_at;
                                chatBubble.appendChild(chatText);
                                chatBubble.appendChild(chatDate);
                                chatLine.appendChild(chatBubble);
                                chatWindow.appendChild(chatLine);
                            });
                            resolve();
                        }
                    });
                });
            }

            function sendMessage(event) {
                event.preventDefault();
                const message = event.target.message.value;
                const chatWindow = document.getElementById('chat-window');
                $.ajax({
                    url: '<?php echo base_url("/chat/send") ?>',
                    type: 'POST',
                    data: {
                        message: message,
                        sender_id: <?php echo $this->session->userdata('user_id') ?>,
                        receiver_id: <?php echo $student_id ?>
                    },
                    success: async function (data) {
                        Notify.success('Message sent successfully');
                        await getMessages();
                        chatWindow.scrollTop = chatWindow.scrollHeight;
                        event.target.message.value = '';
                    },
                    error: function (error) {
                        Notify.error('Failed to send message');
                        chatWindow.scrollTop = chatWindow.scrollHeight;
                    }
                });
            }

            $(document).ready(async function () {
                await getMessages();
                let chatWindow = document.getElementById('chat-window');
                chatWindow.scrollTop = chatWindow.scrollHeight;
                setInterval(getMessages, 10000);
            });

            window.getMessages = getMessages;
            window.sendMessage = sendMessage;
        </script>

</body>

</html>