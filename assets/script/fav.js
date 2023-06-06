fetch('?action=favLesson', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'user_id=' + encodeURIComponent(user_id) + '&lesson_id=' + encodeURIComponent(lesson_id)
  })