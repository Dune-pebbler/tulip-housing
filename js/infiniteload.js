jQuery(function ($) {
  // Select the new trigger element
  const scrollTrigger = $("#infinite-scroll-trigger");

  // If the trigger doesn't exist on the page, do nothing
  if (!scrollTrigger.length) {
    return;
  }

  // Use Intersection Observer for performance
  const observer = new IntersectionObserver(
    (entries) => {
      // The callback is triggered when the trigger element enters the viewport
      if (entries[0].isIntersecting) {
        loadMorePosts();
      }
    },
    {
      // Trigger when the element is 300px from the bottom of the viewport
      rootMargin: "0px 0px 300px 0px",
    }
  );

  // Start observing the trigger element
  observer.observe(scrollTrigger[0]);

  let isLoading = false; // Flag to prevent multiple simultaneous requests

  function loadMorePosts() {
    if (isLoading) return; // Exit if a request is already in progress
    isLoading = true;

    // Get data from the trigger's data attributes
    let currentPage = scrollTrigger.data("page");
    const excludeIds = scrollTrigger.data("exclude");
    const totalPosts = scrollTrigger.data("total");
    const postsPerPage = 6; // CHANGED: This now matches your WP_Query setting

    // Show the loading indicator
    scrollTrigger.addClass("loading");

    $.ajax({
      url: my_ajax_obj.ajax_url,
      type: "POST",
      data: {
        action: "load_more_posts",
        nonce: my_ajax_obj.nonce,
        page: currentPage,
        exclude: excludeIds,
      },
      success: function (response) {
        if (response.trim() !== "") {
          // Append new posts and update the page number for the next load
          $("#news-grid-container").append(response);
          scrollTrigger.data("page", currentPage + 1);

          // Check if we've loaded all the posts
          // The '9' here must also be changed to match the initial number of posts loaded in the grid
          const loadedPosts =
            (currentPage - 1) * postsPerPage + excludeIds.length + 6; // CHANGED

          if (loadedPosts >= totalPosts) {
            // No more posts, hide the trigger and stop observing
            scrollTrigger.hide();
            observer.unobserve(scrollTrigger[0]);
          }
        } else {
          // No more posts were found, hide the trigger
          scrollTrigger.hide();
          observer.unobserve(scrollTrigger[0]);
        }
      },
      error: function (xhr, status, error) {
        console.error("An error occurred:", error);
      },
      complete: function () {
        // Hide the loading indicator and allow the next request
        isLoading = false;
        scrollTrigger.removeClass("loading");
      },
    });
  }
});
