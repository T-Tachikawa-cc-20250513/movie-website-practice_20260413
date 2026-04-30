document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('cast-input');
    const list = document.getElementById('cast-suggestions');
    const castList = document.getElementById('cast-list');
    const castTable = document.getElementById('cast-table');
    const addBtn = document.getElementById('add-cast-btn');

    input.addEventListener('input', function () {
        const keyword = input.value;

        fetch('/admin/casts/search?keyword=' + keyword)
            .then(response => response.json())
            .then(data => {
                list.innerHTML = '';

                data.forEach(cast => {

                    const li = document.createElement('li');
                    li.textContent = cast.name;

                    li.addEventListener('click', function () {

                        input.value = cast.name;
                        list.innerHTML = '';
                        addCastToTable(cast);
                    });

                    list.appendChild(li);
                });
            });
    });

    addBtn.addEventListener('click', function () {
        const name = input.value;

        if (!name) return;

        const cast = {
            name: name
        };
        addCastToTable(cast);

        input.value = '';
        list.innerHTML = '';
    });

    function addCastToTable(cast) {
        const tr = document.createElement('tr');

        tr.innerHTML = `
            <td>
                ${cast.name}
                <input type="hidden" name="cast_names[]" value="${cast.name}">
            </td>
            <td><input type="text" name="role_name[]"></td>
            <td>
                <button type="button" onclick="moveUp(this)">↑</button>
                <button type="button" onclick="moveDown(this)">↓</button>
            </td>
            <td><button type="button" onclick="removeRow(this)">削除</button></td>
        `;

        castList.appendChild(tr);
        castTable.style.display = 'table'
    }

});

function removeRow(button) {
    const tr = button.parentNode.parentNode;
    tr.remove();
}

function moveUp(button) {
    const tr = button.parentNode.parentNode;
    const prev = tr.previousElementSibling;

    if (prev) {
        tr.parentNode.insertBefore(tr, prev);
    }
}

function moveDown(button) {
    const tr = button.parentNode.parentNode;
    const next = tr.nextElementSibling;

    if (next) {
        tr.parentNode.insertBefore(next, tr);
    }
}

const directorInput = document.getElementById('director-input');
const directorList = document.getElementById('director-suggestions');
const directorTable = document.getElementById('director-table');
const directorTbody = document.getElementById('director-list');
const addDirectorBtn = document.getElementById('add-director-btn');

// 入力時（予測変換）
directorInput.addEventListener('input', function () {
    const keyword = directorInput.value;

    fetch('/admin/casts/search?keyword=' + keyword)
        .then(response => response.json())
        .then(data => {
            directorList.innerHTML = '';

            data.forEach(cast => {
                const li = document.createElement('li');
                li.textContent = cast.name;

                li.addEventListener('click', function () {
                    directorInput.value = cast.name;
                    directorList.innerHTML = '';
                    addDirectorToTable(cast);
                });

                directorList.appendChild(li);
            });
        });
});

addDirectorBtn.addEventListener('click', function () {
    const name = directorInput.value;

    if (!name) return;

    addDirectorToTable({ name: name });

    directorInput.value = '';
    directorList.innerHTML = '';
});

function addDirectorToTable(cast) {
    const tr = document.createElement('tr');

    tr.innerHTML = `
        <td>
            ${cast.name}
            <input type="hidden" name="director_names[]" value="${cast.name}">
        </td>
        <td>
            <button type="button" onclick="moveUp(this)">↑</button>
            <button type="button" onclick="moveDown(this)">↓</button>
        </td>
        <td>
            <button type="button" onclick="removeRow(this)">削除</button>
        </td>
    `;

    directorTbody.appendChild(tr);
    directorTable.style.display = 'table';
}

const originalInput = document.getElementById('original-input');
const originalList = document.getElementById('original-suggestions');
const originalTable = document.getElementById('original-table');
const originalTbody = document.getElementById('original-list');
const addOriginalBtn = document.getElementById('add-original-btn');

originalInput.addEventListener('input', function () {
    const keyword = originalInput.value;

    fetch('/admin/casts/search?keyword=' + keyword)
        .then(res => res.json())
        .then(data => {
            originalList.innerHTML = '';

            data.forEach(cast => {
                const li = document.createElement('li');
                li.textContent = cast.name;

                li.addEventListener('click', function () {
                    originalInput.value = cast.name;
                    originalList.innerHTML = '';
                    addOriginalToTable(cast);
                });

                originalList.appendChild(li);
            });
        });
});

addOriginalBtn.addEventListener('click', function () {
    const name = originalInput.value;
    if (!name) return;

    addOriginalToTable({ name });

    originalInput.value = '';
    originalList.innerHTML = '';
});

function addOriginalToTable(cast) {
    const tr = document.createElement('tr');

    tr.innerHTML = `
        <td>
            ${cast.name}
            <input type="hidden" name="original_names[]" value="${cast.name}">
        </td>
        <td>
            <button type="button" onclick="moveUp(this)">↑</button>
            <button type="button" onclick="moveDown(this)">↓</button>
        </td>
        <td>
            <button type="button" onclick="removeRow(this)">削除</button>
        </td>
    `;

    originalTbody.appendChild(tr);
    originalTable.style.display = 'table';
}

const songInput = document.getElementById('song-input');
const songList = document.getElementById('song-suggestions');
const songTable = document.getElementById('song-table');
const songTbody = document.getElementById('song-list');
const addSongBtn = document.getElementById('add-song-btn');

songInput.addEventListener('input', function () {
    const keyword = songInput.value;

    fetch('/admin/casts/search?keyword=' + keyword)
        .then(res => res.json())
        .then(data => {
            songList.innerHTML = '';

            data.forEach(cast => {
                const li = document.createElement('li');
                li.textContent = cast.name;

                li.addEventListener('click', function () {
                    songInput.value = cast.name;
                    songList.innerHTML = '';
                    addSongToTable(cast);
                });

                songList.appendChild(li);
            });
        });
});

addSongBtn.addEventListener('click', function () {
    const name = songInput.value;
    if (!name) return;

    addSongToTable({ name });

    songInput.value = '';
    songList.innerHTML = '';
});

function addSongToTable(cast) {
    const tr = document.createElement('tr');

    tr.innerHTML = `
        <td>
            ${cast.name}
            <input type="hidden" name="song_names[]" value="${cast.name}">
        </td>
        <td>
            <button type="button" onclick="moveUp(this)">↑</button>
            <button type="button" onclick="moveDown(this)">↓</button>
        </td>
        <td>
            <button type="button" onclick="removeRow(this)">削除</button>
        </td>
    `;

    songTbody.appendChild(tr);
    songTable.style.display = 'table';
}