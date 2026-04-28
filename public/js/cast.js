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