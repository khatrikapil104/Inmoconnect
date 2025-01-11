$(document).ready(function() {
    loadData(1, { isFilesSection: true });
});
$(document).on("click", ".fileCheckbox", function(e) {
    let selectedCheckboxesArr = [];
    $(".fileCheckbox").each(function(index, element) {
        if ($(element).prop("checked")) {
            selectedCheckboxesArr.push($(element).data("id"));
        }
    });
    if (selectedCheckboxesArr.length > 0) {
        $(".deleteFilesBtn").addClass("gradiant-button");
    } else {
        $(".deleteFilesBtn").removeClass("gradiant-button");
    }
});

$(document).on("click", ".deleteFilesBtn", function(e) {
    let selectedCheckboxesArr = [];
    $(".fileCheckbox").each(function(index, element) {
        if ($(element).prop("checked")) {
            selectedCheckboxesArr.push($(element).data("id"));
        }
    });
});

// function handleFilesSelect(event, folder_id) {
//     const fileList = event.target.files;
//     console.log("kapil");

//     const formData = new FormData();
//     // Append each file to FormData
//     for (const file of fileList) {
//         formData.append("files[]", file);
//     }

//     console.log(folder_id);
//     var routeStoreFiles = routeUrlStoreFiles.replace(":id", folder_id);
//     $(".table_dashboard").addClass("loader");
//     const attributes = {
//         hasButton: false,
//         handleSuccess: function() {
//             loadData(1, { isFilesSection: true });
//             $(".table_dashboard").removeClass("loader");
//         },
//         handleError: function() {
//             $(".table_dashboard").removeClass("loader");
//         },
//         handleErrorMessages: function() {
//             $.each(datas["errors"], function(index, html) {
//                 $(".table_dashboard").removeClass("loader");
//                 show_message(html, "error");
//             });
//         },
//     };
//     const ajaxOptions = {
//         url: routeStoreFiles,
//         method: "post",
//         data: formData,
//     };
//     makeAjaxRequest(ajaxOptions, attributes);
// }

// function handleFilesSelect(event, folder_id) {
//     const fileList = event.target.files;
//     console.log("kapil");

//     const formData = new FormData();
//     // Append each file to FormData
//     for (const file of fileList) {
//         formData.append("files[]", file);
//     }

//     console.log(folder_id);
//     var routeStoreFiles = routeUrlStoreFiles.replace(":id", folder_id);
//     $(".table_dashboard").addClass("loader");
//     const attributes = {
//         hasButton: false,
//         handleSuccess: function() {
//             loadData(1, { isFilesSection: true });
//             $(".table_dashboard").removeClass("loader");
//         },
//         handleError: function() {
//             $(".table_dashboard").removeClass("loader");
//         },
//         handleErrorMessages: function() {
//             $.each(datas["errors"], function(index, html) {
//                 $(".table_dashboard").removeClass("loader");
//                 show_message(html, "error");
//             });
//         },
//     };
//     const ajaxOptions = {
//         url: routeStoreFiles,
//         method: "post",
//         data: formData,
//     };
//     makeAjaxRequest(ajaxOptions, attributes);
// }
let fileTable = $(".dashboard_table tbody");

let files = [];
let fileCount = 0;

const fileDate = new Date();
const fileDateFormatted = `${fileDate.getDate()}/${fileDate.getMonth() + 1}/${fileDate.getFullYear()}`;


let resumable = new Resumable({
    target: routeStoreFiles,
    query: { _token: "{{ csrf_token() }}" },
    fileType: [],
    chunkSize: 2 * 1024 * 1024,
    headers: {
        Accept: "application/json",
    },
    testChunks: false,
    throttleProgressCallbacks: 1,
});



function handleFilesSelect(event, folder_id) {
    files = event.target.files;
    fileCount = files.length;

    for (let i = 0; i < fileCount; i++) {
        resumable.addFile(files[i]);
    }
    resumable.on("fileAdded", function(files) {
        addFileRow(files);
        showProgress();
        resumable.upload();
    });
}

function addFileRow(file) {
    let newRow = `
        <tr id="file-${file.uniqueIdentifier}">
            <td></td>
            <td class="in_progress_row">
                <a href=""><span>${file.fileName}</span></a>
                <div class="task-progress d-flex align-items-center mt-2">
                    <span class="text-14 color-b-blue text-capitalize font-weight-700 lineheight-18">0%</span>
                    <progress class="progress progress2 mx-2" max="100" value="0"></progress>
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                        <path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd" d="M5 6.28399L1.28399 10L0 8.71601L3.71601 5L4.15612e-06 1.28399L1.28399 0L5 3.71601L8.71601 0L10 1.28399L6.28399 5L10 8.71601L8.71601 10L5 6.28399Z" fill="#17213A"></path>
                    </svg>
                </div>
            </td>
            <td>${file.file.type.split("/").pop()}</td>
            <td>${formatFileSize(file.file.size)}</td>
            <td>${fileDateFormatted}</td>
            <td></td>
            <td></td>
        </tr>
    `;
    fileTable.find('#file-' + file.uniqueIdentifier).remove();
    fileTable.prepend(newRow);
}

resumable.on("fileProgress", function(file) {
    const progressValue = Math.floor(file.progress() * 100);
    fileTable.find('.text-center').remove();
    $(`#file-${file.uniqueIdentifier} .progress2`).val(progressValue);
    $(`#file-${file.uniqueIdentifier} .text-14`).text(`${progressValue}%`);
});

resumable.on("fileSuccess", function(file, response) {
    hideProgress();
    fileTable.find('#file-' + file.uniqueIdentifier).remove();
    let newRow = `
        <tr id="file-${file.uniqueIdentifier}">
            <td>

            <input type="checkbox" name="checkbox" class="checkbox checkboxone  fileCheckbox"
                data-id="{{ $result->id }}">

        </td>
        <td class="completed__row"><a
                href="{{ Config('constant.USER_FILE_URL')  }}${file.fileName}"
                target="_blank"><span>${file.fileName}</span></a>

        </td>
        <td><a href="">${file.file.type.split("/").pop()}</a></td>
        <td><a href="">${formatFileSize(file.file.size)}</a></td>
        <td><a href="">${fileDateFormatted}</a></td>
        <td class="download-button"><a href="{{ Config('constant.USER_FILE_URL') }}${file.fileName}"
                download="${file.fileName}"><i
                    class="icon-download_black  icon-20 color-b-blue downloadFileBtn"
                    data-id="{{ $result->id }}"></i></a></td>
        <td class="delete-button"><button><i class="icon-Delete  icon-20 color-b-blue deleteFileBtn"
                    data-id="{{ $result->id }}" data-name="${file.fileName}"></i></button>
        </td>
        </tr>
    `;

    fileTable.prepend(newRow);
});
resumable.on("complete", function() {
    loadData(1, { hasLoader: false, isFilesSection: true });

});

resumable.on("fileError", function(file, response) {

    alert("file uploading error.");
});

let progress = $(".in_progress_row");

function showProgress() {
    progress.find(".progress2").css("width", "0%");
    progress.find(".progress2").html("0%");
    progress.find(".progress2").removeClass("bg-success");
    progress.show();
}

function updateProgress(value) {
    progress.find(".progress2").css("width", `${value}%`);
    progress.find(".progress2").val(`${value}%`);
}

function hideProgress() {
    progress.hide();
}

function formatFileSize(size) {
    if (size < 1024) return size + " Bytes";
    else if (size < 1048576) return (size / 1024).toFixed(2) + " KB";
    else return (size / 1048576).toFixed(2) + " MB";
}