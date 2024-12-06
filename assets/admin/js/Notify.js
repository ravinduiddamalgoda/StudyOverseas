// Description: Notify class to show notifications.

/**
 * @class Notify
 * @description Notify class to show notifications.
 * @example
 * Notify.info("Hello, World!", { timeOut: 3000 });
 * Notify.success("Hello, World!", { timeOut: 5000 });
 * Notify.error("Hello, World!", { timeOut: 5000 });
 * Notify.warn("Hello, World!", { timeOut: 5000 });
 * Notify.promise({promise}, promiseMessage, successMessage, errorMessage)
 * @param {String} message - The message property.
 * @param {Object} props - The properties object.
 * @param {Number} props.timeOut - The timeOut property.
 * @returns {HTMLElement} The notify element.
 * @static
 * @version 1.0
 */

class Notify {
  static notifications = [];
  static timeOut = 5000;

  // Icons for different types of notifications
  static icons = {
    info: "info",
    success: "check_circle",
    error: "error",
    warning: "warning",
    promise: "progress_activity",
  };

  // Constructor
  constructor(props) {
    if (props && props.timeOut) {
      let timeOut = parseInt(props.timeOut);
      this.timeOut = timeOut;
    }
  }

  // Create notify element
  static createNotify(type, message, props) {
    let notify = document.createElement("div"); // Create a div element
    notify.className = `notify notify--${type}`; // Add class to the div element

    notify.setAttribute("draggable", "true"); // Set draggable attribute to true

    // Add event listeners
    notify.addEventListener("mouseover", () => {
      notify.getElementsByClassName(
        "notify__timer-bar"
      )[0].style.animationPlayState = "paused";
    });
    notify.addEventListener("mouseout", () => {
      notify.getElementsByClassName(
        "notify__timer-bar"
      )[0].style.animationPlayState = "running";
    });

    notify.addEventListener("drag", () => {
      this.dismiss(notify);
    });

    //add event listener for click release
    notify.addEventListener("mouseup", () => {
      //add bouceOutRightAnimation
      
    });


    notify.addEventListener("animationend", (event) => {
      if (event.animationName === "bounceOutRight") {
        this.dismiss(notify);
      }
    });

    // Create sub elements, add classes and content
    let notify_message = document.createElement("div");
    notify_message.className = "notify__message";

    let notify_message_icon = document.createElement("div");
    notify_message_icon.className = "notify__message-icon material-icon";
    notify_message_icon.innerHTML = this.icons[type];

    let notify_message_text = document.createElement("div");
    notify_message_text.className = "notify__message-text";
    notify_message_text.innerHTML = message;

    // Append sub elements to parent element
    notify_message.appendChild(notify_message_icon);
    notify_message.appendChild(notify_message_text);

    let notify_timer = document.createElement("div");
    notify_timer.className = "notify__timer";

    let notify_timer_bar = document.createElement("div");
    notify_timer_bar.className = "notify__timer-bar";
    notify_timer_bar.style.animationDuration =
      ((props ? props.timeOut : null) || this.timeOut) + "ms"; // Set animation duration
    notify_timer_bar.style.animationPlayState = "paused";

    // Add event listener for animation end
    notify_timer_bar.addEventListener("animationend", () => {
      notify.classList.remove("notify--start-animation");
      notify.classList.add("notify--dismiss-animation");
    });

    // Append sub elements to parent element
    notify_timer.appendChild(notify_timer_bar);

    notify.appendChild(notify_message);
    notify.appendChild(notify_timer);

    return notify; // Return the notify element
  }

  static dismiss(notify) {
    let parent = notify.parentNode;
    if (parent) {
      parent.removeChild(notify);

      let height = 0;

      // Calculate height of parent element should be
      for (let child of parent.children) {
        height += this.calHeight(child);
      }

      parent.style.height = height + "px";

      // Hide parent element if no child element is present
      if (parent.childElementCount === 0) {
        parent.style.display = "none";
      }
    } else {
      console.log("Parent node not found for notify element.");
    }
  }

  // Static methods
  static info(message, props) {
    let notify = this.createNotify("info", message, props); // Create notify element
    this.notifications.push(notify); // Add notify element to notifications array
    this.render();
    return notify;
  }

  static success(message, props) {
    let notify = this.createNotify("success", message, props);
    this.notifications.push(notify);
    this.render();
    return notify;
  }

  static error(message, props) {
    let notify = this.createNotify("error", message, props);
    this.notifications.push(notify);
    this.render();
    return notify;
  }

  static warn(message, props) {
    let notify = this.createNotify("warning", message, props);
    this.notifications.push(notify);
    this.render();
    return notify;
  }

  static promise(promise, promiseMessage, successMessage, errorMessage, props) {
    let notify = this.createNotify("promise", promiseMessage, props);
    this.notifications.push(notify);
    this.render("promise");

    promise
      .then((response) => {
        notify.classList.add("notify--dismiss-animation");
        setTimeout(() => {
          Notify.success(successMessage);
        }, 500); 
      })
      .catch((error) => {
        notify.classList.add("notify--dismiss-animation");
        setTimeout(() => {
          Notify.error(errorMessage);
        }, 500); 
      });

    return notify;
  }

  static asyncPromise(promiseMessage, props) {
    let notify = this.createNotify("promise", promiseMessage, props);
    this.notifications.push(notify);
    this.render("promise");

    return notify;
  }

  static resolve(notify, successMessage) {
    notify.classList.add("notify--dismiss-animation");
    setTimeout(() => {
      Notify.success(successMessage);
    }, 500); 
  }

  static reject(notify, errorMessage) {
    notify.classList.add("notify--dismiss-animation");
    setTimeout(() => {
      Notify.error(errorMessage);
    }, 500); 
  }

  // Render notifications
  static render(type) {
    let notify = this.notifications.shift(); // Get the first element from notifications array
    let container = document.getElementsByClassName("notify-container")[0]; // Get the notify container

    // Create notify container if not present
    if (!container) {
      container = document.createElement("div"); // Create a div element
      container.className = "notify-container"; // Add class to the div element
      document.body.appendChild(container); // Append the div element to the body element
    }

    container.style.display = "flex"; // Set display property to flex

    let height = container.style.height ? parseInt(container.style.height) : 0; // Get the height of the container

    container.appendChild(notify); // Append notify element to container

    height += this.calHeight(notify); // Calculate height of container element should be
    container.style.height = height + "px"; // Set height of container element

    if (type !== "promise") {
      notify.classList.add("notify--start-animation"); // Add class to notify element
      notify.getElementsByClassName("notify__timer-bar")[0].style.animationPlayState = "running"; // Set animation play state to running
    }
  }

  // Calculate height of element
  static calHeight(element) {
    let height = 0;

    height += element.offsetHeight;
    height += parseInt(window.getComputedStyle(element).marginBottom);
    height += parseInt(window.getComputedStyle(element).marginTop);

    return height;
  }
}

export default Notify;
