<?php

namespace SymfonyHackers\Bundle\FormBundle\Twig\Extension;

use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormRendererInterface;
use Symfony\Bridge\Twig\Node\SearchAndRenderBlockNode;

/**
 * FormExtension extends Twig with form capabilities.
 */
class FormExtension extends \Twig_Extension
{
    /**
     * This property is public so that it can be accessed directly from compiled
     * templates without having to call a getter, which slightly decreases performance.
     *
     * @var FormRendererInterface
     */
    public $renderer;

    /**
     * Constructs.
     *
     * @param FormRendererInterface $renderer
     */
    public function __construct(FormRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('form_javascript', [$this, 'renderJavascript'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('form_stylesheet', null, [
                'is_safe' => ['html'],
                'node_class' => SearchAndRenderBlockNode::class,
            ]
            ),
        );
    }

    /**
     * Render Function Form Javascript
     *
     * @param FormView $view
     * @param bool     $prototype
     *
     * @return string
     */
    public function renderJavascript(FormView $view, $prototype = false)
    {
        $block = $prototype ? 'javascript_prototype' : 'javascript';

        return $this->renderer->searchAndRenderBlock($view, $block);
    }
}
