package tn.esprit.ecodev.Services;

import lombok.AllArgsConstructor;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import tn.esprit.ecodev.Entities.RecycledProduct;
import tn.esprit.ecodev.Entities.Category;
import tn.esprit.ecodev.Entities.RecycledContent;
import tn.esprit.ecodev.Repositories.RecycledProductRepository;
import tn.esprit.ecodev.Repositories.CategoryRepository;
import tn.esprit.ecodev.Repositories.RecycledContentRepository;
import tn.esprit.ecodev.Services.RecycledProductService;

import java.util.List;
import java.util.Optional;


@Service
@AllArgsConstructor
@Slf4j
public class RecycledProductServiceImpl implements RecycledProductService {

    private RecycledProductRepository recycledProductRepository;


    private CategoryRepository categoryRepository;

    private RecycledContentRepository recycledContentRepository;

    @Override
    public List<RecycledProduct> getAllProducts() {
        return recycledProductRepository.findAll();
    }

    @Override
    public RecycledProduct getProductById(Long id) {
        return recycledProductRepository.findById(id).orElse(null);
    }

    @Override
    public RecycledProduct createProduct(RecycledProduct product) {
        // Set the default sales center ID

        // Optionally, if you want to retrieve category and recycled content
        if (product.getCategory() != null && product.getCategory().getId() != null) {
            Category category = categoryRepository.findById(product.getCategory().getId()).orElse(null);
            if (category != null) {
                product.setCategory(category);
            }
        }

        if (product.getRecycledContent() != null && product.getRecycledContent().getId() != null) {
            RecycledContent recycledContent = recycledContentRepository.findById(product.getRecycledContent().getId()).orElse(null);
            if (recycledContent != null) {
                product.setRecycledContent(recycledContent);
            }
        }

        // Save the new product to the repository
        return recycledProductRepository.save(product);
    }


    @Override
    public RecycledProduct updateProduct(Long id, RecycledProduct product) {
        Optional<RecycledProduct> existingProductOpt = recycledProductRepository.findById(id);
        if (existingProductOpt.isPresent()) {
            RecycledProduct existingProduct = existingProductOpt.get();
            existingProduct.setName(product.getName());
            existingProduct.setImage(product.getImage());
            existingProduct.setDescription(product.getDescription());
            existingProduct.setQuantity(product.getQuantity());
            existingProduct.setPrice(product.getPrice());
            existingProduct.setCategory(product.getCategory()); // if updating category
            existingProduct.setRecycledContent(product.getRecycledContent()); // if updating recycled content
            return recycledProductRepository.save(existingProduct);
        }
        return null; // or throw an exception
    }

    @Override
    public void deleteProduct(Long id) {
        recycledProductRepository.deleteById(id);
    }
}
