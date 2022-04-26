<!-- <script type="text/javascript">
    const url = 'https://localhost:8000/api/alinthitpos/alinthitpos';
    fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                user_id: '<?php echo $sessionUserId ?>',
                user_online_status: 1
            })
        })
        .then(res => {
                return res.json()
            }

        )
        .then(data => console.log(data))
        .catch(error => console.log('Error'))
</script> -->