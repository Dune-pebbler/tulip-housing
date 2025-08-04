jQuery(document).ready(function () {
  // startOwlSlider();
  setHamburgerActiveToggle();
  initInView(); // Call our inView initialization function
  initHeroSliderTwoCols();
  initProjectsCarousel();
});
jQuery(window).scroll(function () {
  // hideOnScroll();
});
jQuery(window).resize(function () {});

function setHamburgerActiveToggle() {
  jQuery(".hamburger").on("click", function () {
    jQuery(".hamburger").addClass("is-active");
    jQuery("#nav-items").addClass("is-active");
    jQuery("body, html").addClass("stop-scrolling");
  });
  jQuery("#cross").on("click", function () {
    jQuery(".hamburger").removeClass("is-active");
    jQuery("#nav-items").removeClass("is-active");
    jQuery("body, html").removeClass("stop-scrolling");
  });
}

function hideOnScroll() {
  //needs work
  var currentScrollTop = jQuery(window).scrollTop();
  if (togglePosition < currentScrollTop && togglePosition > 180 && !isMobile) {
    mainHeader.addClass("hide");
  } else {
    mainHeader.removeClass("hide");
  }
  togglePosition = currentScrollTop;
}

function startOwlSlider() {
  jQuery(".owl-carousel").owlCarousel({
    dots: false,
    nav: true,
    margin: 12,
    navText: [
      '<img class="checkmark" src="/wp-content/themes/valkentij-theme/images/check.svg" alt="checkmark icon">',
      '<img class="checkmark" src="/wp-content/themes/valkentij-theme/images/check.svg" alt="checkmark icon">',
    ],
    responsive: {
      0: {
        items: 1,
        stagePadding: 32,
      },
      768: {
        items: 2,
      },
      1199: {
        items: 3,
      },
    },
  });
}
function initProjectsCarousel() {
  jQuery(".projects-carousel").owlCarousel({
    items: 1,
    loop: true,
    margin: 0,
    nav: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    navText: [
      // Previous
      `<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 70 70">
  <g id="Group_82" data-name="Group 82" transform="translate(-1620 -2559)">
    <circle id="Ellipse_1" data-name="Ellipse 1" cx="35" cy="35" r="35" transform="translate(1620 2559)" fill="#f58220"/>
    <path id="Path_130" data-name="Path 130" d="M1143.152,3142.543l16.47,16.47-16.47,16.47" transform="translate(2806.387 5753.013) rotate(180)" fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="6"/>
  </g>
</svg>`,
      // Next
      `<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 70 70">
  <g id="Group_83" data-name="Group 83" transform="translate(-1707 -2559)">
    <circle id="Ellipse_2" data-name="Ellipse 2" cx="35" cy="35" r="35" transform="translate(1777 2629) rotate(180)" fill="#f58220"/>
    <path id="Path_131" data-name="Path 131" d="M1143.152,3142.543l16.47,16.47-16.47,16.47" transform="translate(590.613 -565.013)" fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="6"/>
  </g>
</svg>
`,
    ],
  });
}

// AJAX FILTERS
function postcodeAutofill() {
  console.log("main.js loaded");
  jQuery("#input_3_7").on("change", function () {
    console.log("input jquery hi!");

    // Get the value from the input field
    var postcodeValue = jQuery("#input_3_3").val();
    var houseNumberValue = jQuery(this).val();

    jQuery.ajax({
      // Use the input value in the URL
      url:
        "https://postcode.tech/api/v1/postcode?postcode=" +
        encodeURIComponent(postcodeValue) +
        "&number=" +
        encodeURIComponent(houseNumberValue),
      headers: {
        Authorization: "Bearer 28d9bd81-3f4d-4cec-a05d-4ec732e9f578",
      },
      method: "GET",

      success: function (data) {
        jQuery("#input_3_5").val(data.city);
        // Handle the successful response
        console.log(data);
        // Populate Gravity Forms fields with the received data
        // populateGravityFormsFields(data);
      },
      error: function (error) {
        // Handle errors
        console.error("Error fetching KVK data:", error);
      },
    });
  });
}

function setOnBtnAjaxFilter() {
  jQuery(".filter-change").on("change", function () {
    jQuery("#all-projects").addClass("fade-out");
    jQuery("#loader").show();

    jQuery.ajax({
      //object from functions.php
      url: ajax_object.ajax_url,
      type: "POST",
      data: {
        action: "filter_projects",
        filters: {
          budget: {
            budgetFrom: jQuery("input[name='budget-from']").val(),
            budgetTo: jQuery("input[name='budget-to']").val(),
            field: "budget",
          },
          stays: {
            staysAmount: jQuery("#filter-stays").val(),
            field: "aantal_nachten",
          },
          people: {
            peopleAmount: jQuery("#filter-people").val(),
            field: "max_aantal_bruiloftsgasten",
          },
        },
      },
      success: function (response) {
        var responseData = JSON.parse(response);
        var htmlContent = responseData.html;
        var postCount = responseData.postCount;

        jQuery("#loader").hide();
        jQuery("#all-projects").html(htmlContent);
        jQuery("#all-projects").css("opcacity", 1);
        jQuery("#all-projects").removeClass("fade-out");
        jQuery("#filter-results").text(postCount);
      },
    });
  });
}

// Website maintenance closure functionality
(function () {
  var startDate = new Date("2024-11-22T13:47:00"); // Start date of closure
  var endDate = new Date("2024-11-22T13:56:00"); // End date of closure
  var currentDate = new Date();

  // Get the current URL
  var currentUrl = window.location.href;

  // Check if the current date is within the closed period
  if (currentDate >= startDate && currentDate <= endDate) {
    // Check if the current URL is the specific page (home page)
    if (currentUrl === "https://template-tim.dune-pebbler.nl/") {
      // Redirect to a maintenance page
      window.location.href =
        "https://template-tim.dune-pebbler.nl/niet-beschikbaar/"; // Maintenance page URL
    }
  }
})();

// Initialize inView functionality
function initInView() {
  // Check if inView is available (library loaded)
  if (typeof inView !== "undefined") {
    // Helper to set enter/exit behavior
    function setInView(selector) {
      inView(selector)
        .on("enter", function (el) {
          el.classList.add("in-view");
        })
        .on("exit", function (el) {
          el.classList.remove("in-view"); // Reset when leaving view
        });
    }

    // Apply to all your animations
    setInView(".fade-in-on-scroll");
    setInView(".slide-left-on-scroll");
    setInView(".slide-right-on-scroll");
    setInView(".scale-up-on-scroll");
    setInView(".rotate-in-on-scroll");
    setInView(".bounce-in-on-scroll");
    setInView(".flip-in-on-scroll");
    setInView(".typewriter-on-scroll");
    setInView(".delayed-on-scroll");

    // For staggered items
    inView(".stagger-on-scroll")
      .on("enter", function (el) {
        var children = el.querySelectorAll(".stagger-item");
        children.forEach(function (child, index) {
          setTimeout(function () {
            child.classList.add("in-view");
          }, index * 100);
        });
      })
      .on("exit", function (el) {
        // Reset staggered items
        var children = el.querySelectorAll(".stagger-item");
        children.forEach(function (child) {
          child.classList.remove("in-view");
        });
      });

    console.log("All inView listeners set up successfully");
  } else {
    console.error("inView library not loaded");
    fallbackScrollAnimation();
  }
}
function initHeroSliderTwoCols() {
  const $carousel = jQuery(".hero-slider_two_cols .owl-carousel");
  const isMobile = window.innerWidth < 768;
  let direction = "next";

  if ($carousel.length === 0) return; // Safety check

  $carousel.owlCarousel({
    items: 2,
    loop: false,
    autoplay: false,
    smartSpeed: 800,
    nav: false,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
    },
  });

  if (isMobile) {
    setInterval(function () {
      const $activeItems = $carousel.find(".owl-item.active");
      const current = $activeItems.first().index();
      const total = $carousel.find(".owl-item").length;

      // Decide direction
      if (current === 0) {
        direction = "next";
      } else if (current === total - 1) {
        direction = "prev";
      }

      // Trigger next or prev
      if (direction === "next") {
        $carousel.trigger("next.owl.carousel");
      } else {
        $carousel.trigger("prev.owl.carousel");
      }
    }, 5000);
  }
}
// News Load More Handler
function initNewsLoadMore() {
  const loadMoreButton = document.getElementById("load-more-news");

  if (!loadMoreButton) return; // Exit if button doesn't exist on this page

  let currentPage = 2;
  let isLoading = false;
  const postsPerPage = 9;

  loadMoreButton.addEventListener("click", function (e) {
    e.preventDefault();

    if (isLoading) return;

    const totalPosts = parseInt(this.dataset.total);
    const loadedPosts = (currentPage - 1) * postsPerPage;

    if (loadedPosts >= totalPosts) {
      this.style.display = "none";
      return;
    }

    isLoading = true;
    this.textContent = "Laden...";
    this.disabled = true;

    // Get the WordPress REST API URL (you'll need to set this in your PHP)
    const restUrl = window.wpApiSettings
      ? window.wpApiSettings.root + "wp/v2/posts"
      : "/wp-json/wp/v2/posts";

    const params = new URLSearchParams({
      per_page: postsPerPage,
      page: currentPage,
      _embed: "true",
    });

    fetch(`${restUrl}?${params}`)
      .then((response) => {
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
      })
      .then((posts) => {
        if (posts && posts.length > 0) {
          const container = document.getElementById("news-grid-container");
          const newContent = createNewsItemsHTML(posts);
          container.insertAdjacentHTML("beforeend", newContent);

          currentPage++;

          // Check if we've loaded all posts
          const newLoadedPosts = (currentPage - 1) * postsPerPage;
          if (newLoadedPosts >= totalPosts) {
            loadMoreButton.style.display = "none";
          } else {
            loadMoreButton.textContent = "Laad meer";
            loadMoreButton.disabled = false;
          }
        } else {
          loadMoreButton.style.display = "none";
        }
      })
      .catch((error) => {
        console.error("Failed to load posts:", error);
        loadMoreButton.textContent = "Fout bij laden - probeer opnieuw";

        setTimeout(() => {
          loadMoreButton.textContent = "Laad meer";
          loadMoreButton.disabled = false;
        }, 2000);
      })
      .finally(() => {
        isLoading = false;
      });
  });
}

// Helper function to create HTML for news items
function createNewsItemsHTML(posts) {
  return posts
    .map((post) => {
      let imageUrl = "";

      // Get featured image
      if (
        post._embedded &&
        post._embedded["wp:featuredmedia"] &&
        post._embedded["wp:featuredmedia"][0]
      ) {
        imageUrl = post._embedded["wp:featuredmedia"][0].source_url;
      }

      // Create excerpt (strip HTML and limit words)
      let excerpt = post.excerpt.rendered.replace(/<[^>]*>/g, "").trim();
      const words = excerpt.split(" ");
      if (words.length > 20) {
        excerpt = words.slice(0, 20).join(" ") + "...";
      }

      // Escape HTML attributes
      const title = escapeHtml(post.title.rendered);
      const link = escapeHtml(post.link);

      return `
          <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
              <div class="news-grid-item">
                  ${
                    imageUrl
                      ? `
                      <div class="news-grid-image">
                          <img src="${escapeHtml(
                            imageUrl
                          )}" alt="${title}" class="img-fluid">
                      </div>
                  `
                      : ""
                  }
                  <div class="news-grid-content">
                      <h3>${title}</h3>
                      <p>${escapeHtml(excerpt)}</p>
                      <a href="${link}" class="btn news-grid-button">Lees verder</a>
                  </div>
              </div>
          </div>
      `;
    })
    .join("");
}

// Helper function to escape HTML
function escapeHtml(text) {
  const div = document.createElement("div");
  div.textContent = text;
  return div.innerHTML;
}

// Initialize when DOM is ready
document.addEventListener("DOMContentLoaded", function () {
  initNewsLoadMore();
});

// Also initialize if script loads after DOM is ready
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initNewsLoadMore);
} else {
  initNewsLoadMore();
}
