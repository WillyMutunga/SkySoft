from rest_framework import viewsets
from .models import Product
from .serializers import ProductSerializer

class ProductViewSet(viewsets.ReadOnlyModelViewSet):
    """
    API endpoint that allows products to be viewed.
    We make it ReadOnly because adding/editing will be done via Django Admin.
    """
    queryset = Product.objects.all()
    serializer_class = ProductSerializer
