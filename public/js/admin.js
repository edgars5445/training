var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

function openTicket(post_id){
    let post = document.querySelector(".post" + post_id);
    let report = document.querySelector(".report" + post_id);
    if(post.style.display == "none"){
        post.style.display = "block";
        report.style.background = '#eef58a';
    } else {
        post.style.display = "none";
        report.style.background = '#e6e6e6';
    }
}

reportDismissButtons = document.querySelectorAll(".report-dismiss");

reportDismissButtons.forEach((button) => {
    button.addEventListener('click', () => {
        let reportid = button.dataset.reportId;
        let reportBox = document.querySelector('.reportDiv' + reportid);
        let reportParent = reportBox.parentNode;
        let postBox = document.querySelector('.post' + button.dataset.postId);
        let postParent = postBox.parentNode;
        $.ajax({
            url: "/admin/ticket/delete",
            type: 'DELETE',
            data: {
                report_id: reportid,
                _token: CSRF_TOKEN
            }, 
            success: function() {
                reportBox.remove();
                postBox.remove();
                if(reportParent.childElementCount == 0){
                    reportParent.append("There are no reports to review!")
                }
                if(postParent.childElementCount == 0){
                    postParent.append("Open a ticket, if you want to review it in more detail!")
                }
            }
        }
        )   
    });
});

reportResolveButtons = document.querySelectorAll(".report-resolve");

reportResolveButtons.forEach((button) => {
    button.addEventListener('click', () => {
        let post_id = button.dataset.postId;
        let category = document.querySelector(".postCategory"+post_id).value;
        let section = document.querySelector(".postSection"+ post_id).value;
        let checkBox = document.querySelector(".deletePost"+post_id).checked;

        let reportid = button.dataset.reportId;
        let reportBox = document.querySelector('.reportDiv' + reportid);
        let reportParent = reportBox.parentNode;
        let postBox = document.querySelector('.post' + button.dataset.postId);
        let postParent = postBox.parentNode;
        
        console.log(checkBox);
        $.ajax({
            url: "/admin/ticket/update",
            type: 'PATCH',
            data: {
                report_id: reportid,
                post_id: post_id,
                category_id: category,
                section_id: section,
                check_box_value: checkBox,
                _token: CSRF_TOKEN
            }, 
            success: function(response) {
                reportBox.remove();
                postBox.remove();
                if(reportParent.childElementCount == 0){
                    reportParent.append("There are no reports to review!")
                }
                if(postParent.childElementCount == 0){
                    postParent.append("Open a ticket, if you want to review it in more detail!")
                }
            }
        }
        )   
    });
});