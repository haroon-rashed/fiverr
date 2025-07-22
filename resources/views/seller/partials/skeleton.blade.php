<style>
    .skeleton {
        background: linear-gradient(90deg, #e0e0e0 25%, #f0f0f0 50%, #e0e0e0 75%);
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite;
    }

    .skeleton-text {
        height: 16px;
        margin-bottom: 8px;
        border-radius: 4px;
    }

    .skeleton-circle {
        border-radius: 50%;
    }

    .skeleton-image {
        height: 500px;
        border-radius: 8px;
    }

    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }

        100% {
            background-position: 200% 0;
        }
    }
</style>
<div class="container mt-5 gig-skeleton d-none">
    <!-- Skeleton Loader -->
    <div class="row" id="skeleton-loader">
        <div class="col-md-8">
            <div class="skeleton skeleton-image w-100 mb-3"></div>
        </div>
        <div class="col-md-4">
            <div class="skeleton skeleton-text w-75 mb-2"></div>
            <div class="d-flex align-items-center mb-2">
                <div class="skeleton skeleton-circle" style="width: 50px; height: 50px;"></div>
                <div class="ms-2">
                    <div class="skeleton skeleton-text w-50 mb-1"></div>
                    <div class="skeleton skeleton-text w-25"></div>
                </div>
            </div>
            <div class="skeleton skeleton-text w-50 mb-3"></div>
            <div class="skeleton skeleton-text w-100 mb-2"></div>
            <div class="skeleton skeleton-text w-100 mb-2"></div>
            <div class="skeleton skeleton-text w-100 mb-2"></div>
            <div class="skeleton skeleton-text w-100 mb-2"></div>
            <div class="skeleton skeleton-text w-100 mb-2"></div>
            <div class="skeleton skeleton-text w-50 mb-3"></div>
            <div class="skeleton skeleton-text w-25 mb-3"></div>
        </div>
    </div>
</div>