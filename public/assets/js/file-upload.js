document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".file-upload").forEach(uploadBox => {
        let fileInput = uploadBox.querySelector(".file-input");
        let previewBox = uploadBox.querySelector(".file-preview");
        let previewImg = uploadBox.querySelector(".preview-img");
        let fileName = uploadBox.querySelector(".file-name");
        let fileSize = uploadBox.querySelector(".file-size");
        let removeBtn = uploadBox.querySelector(".remove-btn");
        let removeFlag = uploadBox.querySelector(".remove-flag");

        if (!fileInput) return;

        fileInput.addEventListener("change", function () {
            if (this.files && this.files[0]) {
                let file = this.files[0];
                let reader = new FileReader();

                reader.onload = e => previewImg.src = e.target.result;
                reader.readAsDataURL(file);

                fileName.textContent = file.name;
                fileSize.textContent = (file.size / 1024).toFixed(2) + " KB";

                previewBox.classList.remove("d-none");
                removeFlag.value = "0";
            }
        });

        if (removeBtn) {
            removeBtn.addEventListener("click", function () {
                fileInput.value = "";
                previewImg.src = "";
                fileName.textContent = "";
                fileSize.textContent = "";
                previewBox.classList.add("d-none");
                removeFlag.value = "1";
            });
        }
    });
});
