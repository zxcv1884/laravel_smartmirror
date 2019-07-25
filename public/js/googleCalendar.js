//彈出視窗位置置中
function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    let dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
    let dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;

    let width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    let height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    let systemZoom = width / window.screen.availWidth;
    let left = (width - w) / 2 / systemZoom + dualScreenLeft
    let top = (height - h) / 2 / systemZoom + dualScreenTop + 50
    let newWindow = window.open(url, title, 'scrollbars=yes, width=' + w / systemZoom + ', height=' + h / systemZoom + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) newWindow.focus();
}

function disp_prompt() {
    PopupCenter('https://accounts.google.com/o/oauth2/v2/auth?access_type=offline&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fcalendar.readonly&response_type=code&client_id=1076605905502-kb1njpjv3pv1rq8a639ct994erlud0oj.apps.googleusercontent.com&redirect_uri=urn%3Aietf%3Awg%3Aoauth%3A2.0%3Aoob', 'xtf', '515', '600');
    swal({
        title: "Add Note",
        input: "textarea",
        showCancelButton: true,
        confirmButtonColor: "#1FAB45",
        confirmButtonText: "Save",
        cancelButtonText: "Cancel",
        buttonsStyling: true,
        preConfirm: (Code) => {
            $.ajax({
                type: "POST",
                url: "googleCalendar",
                data: {'email':email
                    ,'Code': Code},
                cache: false,
                success: function (response) {
                    swal(
                        "Sccess!",
                        response.Code,
                        "success"
                    )
                },
                failure: function (response) {
                    swal(
                        "Internal Error",
                        "Oops, your note was not saved.", // had a missing comma
                        "error"
                    )
                }
            });
        }
    })
}