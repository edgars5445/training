let reportButtons = document.querySelectorAll(".report-button");
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

reportButtons.forEach((button) => {
    button.addEventListener('click', () => {    
        let reportPostId = button.dataset.postid;
        let reportUserId = button.dataset.userid;
        let submitButton = document.querySelector(".submit-report" + button.dataset.postid);
        submitButton.addEventListener('click',()=>{
            let report = document.querySelector(".report_select" + button.dataset.postid).value;
            $.post(
                "/report",
                {report: report, postId: reportPostId, userId: reportUserId, _token: CSRF_TOKEN}
            )
            
            button.style.background = "red";
            button.disabled ="true";
        })
           
    });
});