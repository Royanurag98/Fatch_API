const btns = document.querySelectorAll(".btn");

btns.forEach(btn => {
    btn.addEventListener("click", () => {
        const postId = btn.getAttribute("data-postid");
        const comments = document.querySelectorAll(".comment.post-" + postId);
        
        comments.forEach((comment) => {
            comment.style.display = "block";
      });
    });
});

const hbtns = document.querySelectorAll(".hideBtn");

hbtns.forEach(btn => {
    btn.addEventListener("click", () => {
        const postId = btn.getAttribute("data-postid");
        const comments = document.querySelectorAll(".comment.post-" + postId);
        
        comments.forEach(comment => {
            comment.style.display = "none";
        });
    });
});

