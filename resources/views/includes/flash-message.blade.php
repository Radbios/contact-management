<style>
    *{
        --color-red: rgb(161, 26, 26);
        --color-green: rgb(20, 146, 68);
        --neon-blue: rgb(81 81 235);
    }
    .flash_message {
        position: fixed;
        right: 24px;
        bottom: 24px;
        background-color: var(--neon-blue);
        width: 400px;
        border-radius: 15px;
        color: white;
        display: flex;
        flex-direction: column;
        opacity: 1;
        animation: fadeOut 5s ease-in-out forwards;
        padding: 10px 15px;
        z-index: 1000;
    }

    .flash_message-success {
        background-color: var(--color-green);
    }

    .flash_message-error {
        background-color: var(--color-red);
    }

    .flash_message-title {
        margin-bottom: 5px;
        font-weight: bold;
    }

    .flash_message-content {
        text-align: justify;
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }
</style>

@if(session("success"))
    <div class="flash_message flash_message-success" id="flash-message-success">
        <div class="flash_message-title">
            Sucesso
        </div>
        <div class="flash_message-content">
            {{ session("success") }}
        </div>
    </div>
@endif

@if($errors->any())
    <div class="flash_message flash_message-error" id="flash-message-error">
        <div class="flash_message-title">
            Erro
        </div>
        <div class="flash_message-content">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", () => {
        setTimeout(() => {
            document.querySelectorAll(".flash_message").forEach(el => el.remove());
        }, 5000);
    });
</script>
