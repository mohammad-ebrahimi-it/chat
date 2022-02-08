import Bus from './bus'

Echo.join('chat')
    .here((users) => {
        Bus.$emit('users.here', users)
        console.log(users)
    })
    .joining((user) => {
        Bus.$emit('users.joined', user)
        console.log(user)
    })
    .leaving((user) => {
        Bus.$emit('users.left', user)
        console.log(user)
    })
    .listen('MessageCreated', (e) => {
        Bus.$emit('message.added', e.message)
    })
