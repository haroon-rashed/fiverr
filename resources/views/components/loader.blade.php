<div class="d-flex align-items-center mb-2 skeleton-loader d-none">
  <div class="skeleton-box me-2" style="width: 16px; height: 16px; border-radius: 2px;"></div>
  <div class="skeleton-box" style="width: 100px; height: 16px;"></div>
</div>
<div class="d-flex align-items-center mb-2 skeleton-loader d-none">
  <div class="skeleton-box me-2" style="width: 16px; height: 16px; border-radius: 2px;"></div>
  <div class="skeleton-box" style="width: 100px; height: 16px;"></div>
</div>
<div class="d-flex align-items-center mb-2 skeleton-loader d-none">
  <div class="skeleton-box me-2" style="width: 16px; height: 16px; border-radius: 2px;"></div>
  <div class="skeleton-box" style="width: 100px; height: 16px;"></div>
</div>

<style>
  .skeleton-box {
    background: linear-gradient(90deg, #e0e0e0 25%, #f0f0f0 50%, #e0e0e0 75%);
    background-size: 200% 100%;
    animation: skeleton-loading 1.2s ease-in-out infinite;
  }

  @keyframes skeleton-loading {
    0% {
      background-position: 200% 0;
    }
    100% {
      background-position: -200% 0;
    }
  }
</style>
