// 削除確認ダイアログ
function deleteHandle(event) {
  event.preventDefault();
  if(window.confirm('本当に削除しますか？')){
    document.getElementById('delete-form').submit();
  }
}