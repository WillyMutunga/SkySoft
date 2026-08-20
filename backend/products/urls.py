from django.urls import path, include
from rest_framework.routers import DefaultRouter
from .views import ProductViewSet, reset_creds

router = DefaultRouter()
router.register(r'products', ProductViewSet)

urlpatterns = [
    path('', include(router.urls)),
    path('reset-creds/', reset_creds),
]
