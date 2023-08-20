document.addEventListener("DOMContentLoaded", function () {
    var closeButtons = document.querySelectorAll('.close-button');
    closeButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var alert = this.parentNode;
            hideAlert(alert);
        });
    });

    var alerts = document.querySelectorAll('.alert-container .alert');
    alerts.forEach(function (alert) {
        hideAlertAfterTimeout(alert, 2000);
    });

    var copyableCells = document.querySelectorAll(".copyable");
    copyableCells.forEach(function (cell) {
        cell.addEventListener("click", function () {
            var textToCopy = cell.textContent.trim();
            copyTextToClipboard(textToCopy);
            showCopyConfirmation();
        });
    });

    function copyTextToClipboard(text) {
        var dummyInput = document.createElement("textarea");
        document.body.appendChild(dummyInput);
        dummyInput.value = text;
        dummyInput.select();
        document.execCommand("copy");
        document.body.removeChild(dummyInput);
    }

    function showCopyConfirmation() {
        var confirmationMessage = document.createElement("div");
        confirmationMessage.classList.add("alert", "alert-success");
        confirmationMessage.textContent = "Content copied to clipboard !";

        var alertContainer = document.querySelector(".alert-container");
        alertContainer.appendChild(confirmationMessage);

        hideAlertAfterTimeout(confirmationMessage, 2000);
    }

    function hideAlert(alert) {
        alert.style.display = 'none';
    }

    function hideAlertAfterTimeout(alert, timeout) {
        setTimeout(function () {
            hideAlert(alert);
        }, timeout);
    }


    function updateCountdown() {
        var countdownElements = document.getElementsByClassName("countdown");

        for (var i = 0; i < countdownElements.length; i++) {
            var endTimestamp = parseInt(countdownElements[i].getAttribute("data-end"), 10);
            var nowTimestamp = Math.floor(Date.now() / 1000);

            if (endTimestamp > nowTimestamp) {
                var timeRemaining = endTimestamp - nowTimestamp;
                var days = Math.floor(timeRemaining / 86400);
                var hours = Math.floor((timeRemaining % 86400) / 3600);
                var minutes = Math.floor((timeRemaining % 3600) / 60);
                var seconds = timeRemaining % 60;

                var countdownText = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
                countdownElements[i].textContent = countdownText;
            } else {
                countdownElements[i].textContent = "Expired";
            }
        }

        setTimeout(updateCountdown, 1000);
    }

    updateCountdown();


});

